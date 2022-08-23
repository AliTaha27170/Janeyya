<?php

namespace App\Http\Controllers;


use App\Bill;
use App\Dalal;
use App\Date;
use App\helpers\company;
use App\Date_Bill;
use App\Dealer;
use App\Farmer;
use App\User;
use App\Writer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\helpers\users;
use App\Move;

class BillController extends Controller
{

    //*START* >>>>>>>>>>
    public function show($mo = null)
    {
        //bills
        if (auth()->user()->role == 4)
            $items    =   Bill::where('company_id', company::company_id())->where('who_write', auth()->user()->id)->orderBy('id', 'DESC');
        // else if(auth()->user()->role == 3)
        // $items    =   Bill::where('company_id' , company::company_id() )->where('who_write' , auth()->user()->id )->orderBy('id','DESC');
        else
            $items    =   Bill::where('company_id', company::company_id())->orderBy('id', 'DESC');

        if (isset($_GET['today']))
            $items    =  $items->where('created_at', '>=', Carbon::today())->paginate(100);
        else
            $items    =  $items->where('bill_id', null)->paginate(100);

        $dalals   =   User::where('company', company::company_id())->where('role', 5)->orderBy('name', 'DESC')->get();
        $dealers  =   User::where('company', company::company_id())->where('role', 8)->orderBy('name', 'DESC')->get();
        $writers  =   User::where('company', company::company_id())->where('role', 4)->orderBy('name', 'DESC')->get();
        $farmers  =   User::where('company', company::company_id())->where("has_mt3aked",0)->where('role' , 6 )->orWhere("role",7)->orderBy('name', 'DESC')->get();
        $dates    =   Date::where('company_id', company::company_id())->orderBy('name', 'DESC')->get();
        
        $bill_print = Bill::latest()->first();

        return view('main.showTables.Bill')->with([
            "items"     =>  $items,
            "dalals"    =>  $dalals,
            "dealers"   =>  $dealers,
            "writers"   =>  $writers,
            "farmers"   =>  $farmers,
            "dates"     =>  $dates,
            "bill_print"      => $bill_print,
        ]);
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 



    //*START* >>>>>>>>>>
    public function add()
    {
        return view('main.showTables.Bill');
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 


    //*START* >>>>>>>>>>
    public function store(Request $request)
    {
        try {

            //إذا كانت العملية آجل والزبون ليس بتاجر
            if ( ($request->pay_type == 1) and ( !isset($request["dealer_id"]) || $request["dealer_id"] =='') ) {
                return back()->with("error" ,"لا يمكن الشراء بالآجل لغير التاجر ");
            }

            if( (!isset($request["dealer_id"]) ||  $request["dealer_id"] =='') and ( (!isset($request["name"]) ||  $request["name"] =='')  ) )
                return back()->with("error"," الرجاء تحديد تاجر");

                
            // if( (isset($request["dealer_id"]) ) and ( (isset($request["name"]) )  ) )
            //     return back()->with("error","  الرجاء تحديد تاجر أو زبون , وليس كليهما "  );



            $name     = null;
            $read     = 0;
            $writer   =  auth()->user()->id;
            $request["writer_id"] =  $writer ;


            //$type_who = 1 writer   2 company
            //$pay_type =   1 آجل   
            //2 نقدي

            if(auth()->user()->role == 2)
                $type_who =  2;
            else
                $type_who = 1;

            $company  =   auth()->user()->company;



            if (isset($request['dealer_id'])) {
                //type اذا كان تاجر او لا 
                $type     =  1;
            } else {
                $type     =  2;
            }



            $bill =  Bill::create([
                "name"       =>    $request->name,
                "who_write"  =>    auth()->user()->id,
                "code"       =>    "للمناقشة|",
                "phone"      =>    $request->phone,
                "dalal_id"   =>    $request->dalal_id,
                "dealer_id"  =>    $request->dealer_id,
                "writer_id"  =>    $writer,
                "farmer_id"  =>    $request->farmer_id,
                "type_who"   =>    $type_who,
                "type"       =>    $type,
                  
                "company_id" =>    $company,
                "pay_type"   =>    $request->pay_type,
                "notfic"     =>    $read,

            ]);

            $i  = 0;
            $up = 0;
            $details = "";
            foreach ($request['date_id'] as $key) {

                $d = Date::find($key);

                $price    =  $request['price'][$i];
                $quantity =  $request['quantity'][$i];

                $details =   $details .  number_format($price,2) . " * " .  $quantity ." ".$d->name ."  ..  ";

                Date_Bill::create([
                    "bill_id"   =>  $bill->id,
                    "date_id"   =>  $key,
                    "price"     =>  $price,
                    "quantity"  =>  $quantity,
                ]);

                $up += $price * $quantity;


                $i++;
            }

            $bill->update([
                "total" => $up,
            ]);

            //type = 2 نقدي
            //type = 1 آجل

            // تحديث الذمة 
            if ( $request->pay_type == 2) {

                $user = User::where('company', company::company_id())->where("id", $request["writer_id"])->get()->first();
                $assets = $user->assets - $up ;

                $user->update(
                    [
                        "assets" =>  $assets,
                    ]
                );
                

                //إضافة للكشوف الخاصة بالكاتب
                Move::create([

                    "from_him" => $up  ,
                    "for_him"  => 0  ,

                    "pay_him"  =>  $assets > 0 ?  abs($assets) : 0 ,
                    "tack_from_him"  => $assets < 0 ?  abs($assets) : 0 ,

                    "fund_id"    => $request["fund_id"]  ,
                    "company_id" => company::company_id()  ,
                    "user_id"    => $request["writer_id"] ,

                    "details" => $details  ,
                    "user_name" => $user->name  ,

                ]);

            } else {
                if(isset($request["dealer_id"]) and $request["dealer_id"] !='')
                    $user = User::where('company', company::company_id())->where("id", $request["dealer_id"])->get()->first();
                else 
                    return back()->with("error","الرجاء تحديد تاجر");



                $assets = $user->assets - $up ;

                $user->update(
                    [
                        "assets" =>  $assets,
                    ]
                );
                
                //إضافة للكشوف الخاصة بالتاجر 
                Move::create([

                    "from_him" => $up  ,
                    "for_him"  => 0  ,


                    "pay_him"  =>  $assets > 0 ?  abs($assets) : 0 ,
                    "tack_from_him"  => $assets < 0 ?  abs($assets) : 0 ,

                    "fund_id"    => $request["fund_id"]  ,
                    "company_id" => company::company_id()  ,
                    "user_id"    => $request["dealer_id"] ,

                    "details" => $details  ,
                    "user_name" => $user->name  ,


                ]);
            }

            // //إضافة المبلغ لأصول الشركة 
            // $user = User::where('id', company::company_id())->get()->first();
            // $user->update(
            //     [
            //         "assets" => $user->assets + $up,
            //     ]
            // );

            //إضافة المبلغ لأصول المزارع 
            $user = User::where('company', company::company_id())->where("id", $request["farmer_id"])->get()->first();

            $assets = $user->assets + $up ;


            $user->update(
                [
                    "assets"      =>  $assets ,
                    "has_mt3aked" => 1,
                ]
            );

            // $mo=1;
            // return redirect()->route('showBills',$mo);
                            
                //إضافة للكشوف الخاصة بالمزارع  
                Move::create([

                    "from_him" => 0  ,
                    "for_him"  => $up ,

                    // النسبة لحساب الميلغ مع السعي لكل سطر في كشوف المزارع 
                    "rate"   => $user->rate , 

                    "pay_him"  =>  $assets > 0 ?  abs($assets) : 0 ,
                    "tack_from_him"  => $assets < 0 ?  abs($assets) : 0 ,

                    "fund_id"    => $request["fund_id"]  ,
                    "company_id" => company::company_id() ,
                    "user_id"    => $request["farmer_id"] ,

                    "details" => $details  ,
                    "user_name" => $user->name  ,



                ]);

                //قيمة السعي 
                $s3ee =  (($up*$user["rate"]) / 100 ) ;

// dd($s3ee);

                //الضريبة المضافة للسعي 
                $s3ee +=  ($s3ee*15)/100 ;
                
                // خصم السعي من المزاراع 
                $assets = $user["assets"] - $s3ee;


                $user->update(
                    [
                        "assets" =>  $assets ,
                    ]
                );
    

                // إضافة سعي المزارع     
                Move::create([

                    "from_him" => $s3ee  ,
                    "for_him"  => 0 ,

                    "pay_him"  =>  $assets > 0 ?  abs($assets) : 0 ,
                    "tack_from_him"  => $assets < 0 ?  abs($assets) : 0 ,

                    // "fund_id"    => $request["fund_id"]  ,
                    "company_id" => company::company_id() ,
                    "user_id"    => $request["farmer_id"] ,

                    "details" => $details . " سعي "  ,
                    "user_name" => $user->name  ,

                    "type" => "سعي"



                ]);

                





            return back()->with("msg", " تم تحرير الفاتورة  بنجاح ");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 




    //*START* >>>>>>>>>>
    public function edit($id)
    {

        $bill = Bill::where('company_id', company::company_id())->where('id', $id)->first();


        //bills
        if (auth()->user()->role == 4)
            $items    =   Bill::where('company_id', company::company_id())->where('writer_id', auth()->user()->id)->orderBy('id', 'DESC');
        else if (auth()->user()->role == 3)
            $items    =   Bill::where('company_id', company::company_id())->where('who_write', auth()->user()->id)->orderBy('id', 'DESC');
        else
            $items    =   Bill::where('company_id', company::company_id())->orderBy('id', 'DESC');

        if (isset($_GET['today']))
            $items    =  $items->where('created_at', '>=', Carbon::today())->paginate(100);
        else
            $items    =  $items->where('bill_id', null)->paginate(100);

        $dalals   =   User::where('company', company::company_id())->where('role', 5)->orderBy('name', 'DESC')->get();
        $dealers  =   User::where('company', company::company_id())->where('role', 8)->orderBy('name', 'DESC')->get();
        $writers  =   User::where('company', company::company_id())->where('role', 4)->orderBy('name', 'DESC')->get();
        $farmers  =   User::where('company', company::company_id())->where('role', 6)->orderBy('name', 'DESC')->get();
        $dates    =   Date::where('company_id', company::company_id())->orderBy('name', 'DESC')->get();

        return view('main.showTables.Bill')->with([
            "items"     =>  $items,
            "dalals"    =>  $dalals,
            "dealers"   =>  $dealers,
            "writers"   =>  $writers,
            "farmers"   =>  $farmers,
            "dates"     =>  $dates,
            "bill"      =>  $bill,
        ]);
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 




    //*START* >>>>>>>>>>
    public function update(Request $request, $id)
    {
        try {

            $old_bill = Bill::where('company_id', company::company_id())->where('id', $id)->first();
            $who_write = $old_bill->who_write;

            $name     = null;
            $read     = 0;
            $writer   =  $request->writer_id;
            if (auth()->user()->role == 2) {
                $name     =  auth()->user()->name;
                $company  =  auth()->user()->id;
                $type_who =  2;
            } elseif (auth()->user()->role == 3) {
                $type_who =  2;
                $company  =   auth()->user()->company;
            } else {
                $company  =   auth()->user()->company;
                $type_who =  1;
                $writer   =  auth()->user()->id;
                $read     = 1;
            }

            if (isset($request['dealer_id'])) {
                $type     =  1;
            } else {
                $type     =  2;
            }

            if (count(Bill::get()))
                $id = Bill::orderBy('id', "DESC")->get()->first()->id . rand(1000, 9999);
            else
                $id = 0;

            $bill =  Bill::create([
                "name"       =>    $request->name,
                "code"       =>    "SA271" . $id . rand(1000, 9999),
                "who_write"  =>    $who_write,
                "phone"      =>    $request->phone,
                "dalal_id"   =>    $request->dalal_id,
                "dealer_id"  =>    $request->dealer_id,
                "writer_id"  =>    $writer,
                "farmer_id"  =>    $request->farmer_id,
                "type_who"   =>    $type_who,
                "type"       =>    $type,
                "company_id" =>    $company,
                "pay_type"   =>    $request->pay_type,
                "notfic"     =>    $read,

            ]);

            $i  = 0;
            $up = 0;
            foreach ($request['date_id'] as $key) {
                $price    =  $request['price'][$i];
                $quantity =  $request['quantity'][$i];

                Date_Bill::create([
                    "bill_id"   =>  $bill->id,
                    "date_id"   =>  $key,
                    "price"     =>  $price,
                    "quantity"  =>  $quantity,
                ]);

                $up += $price * $quantity;


                $i++;
            }
            $new_code = $bill->code;
            $bill->update([
                "total" => $up,
                "code"  => $old_bill->code,
            ]);


            //جعل الفاتورة القديمة والفواتير التابعة لها في سجل التعديلات للفاتورة الجديدة 
            $old_bill->update([
                'bill_id' => $bill->id,
                "code"   => $new_code,

            ]);

            foreach ($old_bill->bills as $item) {
                $item->update(['bill_id' => $bill->id]);
            }

            // تحديث الذمة 
            if ($bill->type == 2)
                users::on_him_update($bill->who_write);
            else
                users::on_him_update($bill['dealer_id']);


            return redirect(route('editBill', $bill->id))->with("msg", "تم التعديل  بنجاح .");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 




    //*START* >>>>>>>>>>


    public function delete(Request $request, $id)
    {
        $bill = Bill::where('company_id', company::company_id())->first();

        // تحديث الذمة 
        if ($bill->type == 2)
            users::on_him_update($bill->who_write);
        else
            users::on_him_update($bill->dealer_id);

        return redirect()->back()->with('msg', 'تم الحذف بنجاح ');
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

    public function print()
    {
         //bills
         if (auth()->user()->role == 4)
            $items    =   Bill::where('company_id', company::company_id())->where('who_write', auth()->user()->id)->orderBy('id', 'DESC');
        // else if(auth()->user()->role == 3)
        // $items    =   Bill::where('company_id' , company::company_id() )->where('who_write' , auth()->user()->id )->orderBy('id','DESC');
        else
            $items    =   Bill::where('company_id', company::company_id())->orderBy('id', 'DESC');

        if (isset($_GET['today']))
            $items    =  $items->where('created_at', '>=', Carbon::today())->paginate(100);
        else
            $items    =  $items->where('bill_id', null)->paginate(100);
        $dalals   =   User::where('company', company::company_id())->where('role', 5)->orderBy('name', 'DESC')->get();
        $dealers  =   User::where('company', company::company_id())->where('role', 8)->orderBy('name', 'DESC')->get();
        $writers  =   User::where('company', company::company_id())->where('role', 4)->orderBy('name', 'DESC')->get();
        $farmers  =   User::where('company', company::company_id())->where('role', 6)->orderBy('name', 'DESC')->get();
        $dates    =   Date::where('company_id', company::company_id())->orderBy('name', 'DESC')->get();
        $bill_print = Bill::latest()->first();

        return view('main.showTables.Bill')->with([
            "items"     =>  $items,
            "dalals"    =>  $dalals,
            "dealers"   =>  $dealers,
            "writers"   =>  $writers,
            "farmers"   =>  $farmers,
            "dates"     =>  $dates,
            "bill_print"      => $bill_print,
        ]);
    }

}
