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
use Illuminate\Http\Request;

class BillController extends Controller
{
 
    //*START* >>>>>>>>>>
    public function show() 
    {
   
        $items    =   Bill::where('company_id' , company::company_id() )->orderBy('id','DESC')->paginate(100);
        $dalals   =   User::where('company' , company::company_id() )->where('role',5)->orderBy('name','DESC')->get();
        $dealers  =   User::where('company' , company::company_id() )->where('role',8)->orderBy('name','DESC')->get();
        $writers  =   User::where('company' , company::company_id() )->where('role',4)->orderBy('name','DESC')->get();
        $farmers  =   User::where('company' , company::company_id() )->where('role',6)->orderBy('name','DESC')->get();
        $dates    =   Date::where('company_id' , company::company_id() )->orderBy('name','DESC')->get();

        return view('main.showTables.Bill')->with([
            "items"     =>  $items  ,
            "dalals"    =>  $dalals  ,
            "dealers"   =>  $dealers ,
            "writers"   =>  $writers ,
            "farmers"   =>  $farmers ,
            "dates"     =>  $dates   ,
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
            $name     =null ;
            if(auth()->user()->role == 2)
            {
                $name     =  auth()->user()->name ;
                $company  =  auth()->user()->id ;
                $type_who =  2 ;
            }
            elseif (auth()->user()->role == 3) {
                $type_who =  2 ;
                $company  =   auth()->user()->company ;

            }
            else
            {
                $company  =   auth()->user()->company ;
                $type_who =  1 ;

            }

            if(isset($request['dealer_id']))
            {
                $type     =  1 ;
            }
            else
            {
                $type     =  2 ;
            }


            $bill =  Bill::create([
                "name"       =>    $name ,
                "phone"      =>    $request->phone ,
                "dalal_id"   =>    $request->dalal_id ,
                "dealer_id"  =>    $request->dealer_id ,
                "writer_id"  =>    $request->writer_id ,
                "farmer_id"  =>    $request->farmer_id ,
                "type_who"   =>    $type_who ,
                "type"       =>    $type ,
                "company_id" =>    $company ,
                "pay_type"   =>    $request->pay_type ,    
                ]);

                $i=0;
                foreach ($request['date_id'] as $key ) {
                   $price    =  $request['price'][$i]; 
                   $quantity =  $request['quantity'][$i];

                   Date_Bill::create([
                    "bill_id"   =>  $bill->id,
                    "date_id"   =>  $key ,
                    "price"     =>  $price ,
                    "quantity"  =>  $quantity ,
                   ]);


                   $i++;
                }

            
            return redirect()->back()->with("msg","تمت الإضافة بنجاح .");


        } catch (\Throwable $th) {
            //throw $th;
        }
       
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 



       
    //*START* >>>>>>>>>>
    public function edit( $id) 
    {
       
        $items  = Bill::orderBy('id','DESC')->paginate(100);
        $item   = Bill::find($id);
        return view('main.showTables.Bill')->with([
            "items" => $items ,
            "item"  => $item  ,
        ]);
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 



       
    //*START* >>>>>>>>>>
    public function update(Request $request,$id)
    {
        Bill::find($id)->update([
            "name" => $request['name'] ,
        ]);
        return redirect()->back()->with('msg','تم التعديل بنجاح ');
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

      //*START* >>>>>>>>>>

      
      public function delete(Request $request,$id)
      {
        Bill::find($id)->delete();
        return redirect()->back()->with('msg','تم الحذف بنجاح ');
      }
      //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

}


