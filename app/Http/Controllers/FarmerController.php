<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\helpers\company;
use App\Move;

class FarmerController extends Controller
{

//*START* add   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>

    public function add()
    {
        return view('main.Store&Edit.Farmer');
    }

 //*END* add  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>







//*START* Store new Farmer   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>
    public function store(Request $request)
    {
        // create user 
        
        $validator = Validator::make($request->all(), [
            'name'                          => 'required | string ',
            // 'email'                         => 'required | email | unique:users',
            'password'                      => 'required ',
            'phone1'                        => 'required',
          
        ]
       
    );
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        try
        {
            
                $file = $request->file('image');
                $path = null;
                if (isset($file))
                {


                // Generate a file name with extension
                $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();

                // Save the file
                $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/المزارعون/'.$request['name'], $fileName);
              
            }
        
            // store user information
            $user = User::create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'password' => Hash::make($request->password),
                        'role'     => 6,
                        'phone1'                      => $request->phone1,
                        'iban'                        => $request->iban,
                        'adress'                      => $request->adress,
                        'company'                     => auth()->user()->id,
                        'image'                       => $path,
                        'note_p'                      => $request->password ,

                        'rate'                      => $request->rate ,
                    ]);

                    //بحال هنالك متعاقد 
                    if($request['key']=='1' and isset($request['name1']))
                    {
                        $path =null;
                        $file = $request->file('image1');
                        if(isset($file))
                        {


                        // Generate a file name with extension
                        $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
        
                        // Save the file
                        $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/المتعاقدون/'.$request['name1'], $fileName);
              
                    }
                        
                        $user2 = User::create([
                            'name'     => $request->name1,
                            'email'    => $request->email1,
                            'password' => Hash::make($request->password1),
                            'role'     => 7,
                            'phone1'                      => $request->phone11,
                            'iban'                        => $request->iban1,
                            'company'                     => auth()->user()->id,
                            'image'                       => $path,
                            't3akdPrice'                  => $request->t3akdPrice,
                            'farmer_id'                   => $user->id,
                            'note_p'                      => $request->password1 ,
                            "assets" => ($request->t3akdPrice)*-1,
                            'rate'                        => $request->rate1

                        ]);

                        //إضافة قيمة العقد لأصول المزارع 
                        $user->update([
                            "assets" => ($request->t3akdPrice) ,
                            "has_mt3aked" => 1,
                        ]);

                    // قيمة العقد  إضافة للكشوف الخاصة بالمزارع  
                Move::create([

                    "from_him" => 0  ,
                    "for_him"  => $request->t3akdPrice ,

                    //"rate"   => $user->rate , 

                    "pay_him"  => $request->t3akdPrice ,
                    "tack_from_him"  => 0 ,

                    //"fund_id"    => $request["fund_id"]  ,
                    "company_id" => company::company_id() ,
                    "user_id"    => $user["id"] ,

                    "details" => "قيمة العقد من المستأجر " .$user2->name ,
                    "user_name" => $user->name  ,



                ]);

                    // قيمة العقد  إضافة للكشوف الخاصة بالمستأجر  
                    Move::create([

                        "from_him" => $request->t3akdPrice ,
                        "for_him"  =>  0,
    
                        // النسبة لحساب الميلغ مع السعي لكل سطر في كشوف المزارع 
                        //"rate"   => $user->rate , 
    
                        "pay_him"  => 0 ,
                        "tack_from_him"  => $request->t3akdPrice ,
    
                        //"fund_id"    => $request["fund_id"]  ,
                        "company_id" => company::company_id() ,
                        "user_id"    => $user2["id"] ,
    
                        "details" => "قيمة العقد للمالك  " .$user->name ,
                        "user_name" => $user2->name  ,
    
    
                    ]);

                    }

            if($user){ 
                return redirect()->back()->with('success', 'تم الإنشاء  بنجاح');
            }else{
                return redirect('users')->with('error', 'هنالك خطأ ما يرجى المحاولة مرة أخرى ! ');
            }
        }catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
    }
//*END* Store new Farmer   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>

 








//*START* edit  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>


    public function edit($id)
    {
        $user=User::where('id',$id)->where('company',auth()->user()->id)->where('role',6)->first();
        if(!$user)
            return back();

        $user1 =  User::where('farmer_id',$user->id)->first();

        $bills=[];
        if($user->has_mt3aked)
        $bills =  Bill::where("farmer_id", $user1->id)->get();
       
        return view('main.Store&Edit.Farmer')->with([
            "user"     => $user,
            "user1"    =>$user1,
            "has_bills"=>count($bills)
        ]);
    }

//*END* edit  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>











//*START* update  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>

 
    public function update(Request $request,$id)
    {
        $user=User::find($id);
       
        if($user->company != auth()->user()->id && $user->role ==6 )
            return back();

                // update user 
        
              $validator = Validator::make($request->all(), [
            'name'                          => 'required | string ',
            'email'                         => 'required | email',
            'password'                      => 'required ',
            'phone1'                        => 'required',
            'iban'                          => 'required',
            'adress'                        => 'required',
        ]
               
            );
                
                if($validator->fails()) {
                    return redirect()->back()->withInput()->with('error', $validator->messages()->first());
                }

                //بحال الإيميل المٌحدث مكرر 
                if($request->email != $user->email){
                    $u=User::where('email' , $request->email)->first();
                    if($u)
                    {
                        $msg="الإيميل موجود مسبقاً ";
                        return redirect()->back()->withInput()->with('error', $msg);
                    }
                }
                   
                   

                try
                {
                    
                   
                        $file = $request->file('image');
                        $path = $user->image;

                        //بحال قام المزارع  بتحديث الصورة 
                        if(isset($file)){

                       
                        // Generate a file name with extension
                        $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
        
                        // Save the file
                        $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/المزارعون/'.$request['name'], $fileName);
                      
                    }
                
                    
                   

                            //جلب الفواتير والتحقق بحال لو كان المزارع يملك فواتير , لانستطيع تحديث نسبته
                            $bills  = Bill::where("farmer_id" , $id )->get();
                            //بحال كان صاحب الفواتير المتعاقد
                            $bills2 = Bill::where("farmer_id" , User::where("farmer_id",$id )->first()->id )->get();
                            if(count($bills) || count($bills2 ))
                            {

                                User::find($id)->update([
                                    'name'     => $request->name,
                                    'email'    => $request->email,
                                    'password' => Hash::make($request->password),
                                    'phone1'                      => $request->phone1,
                                    'iban'                        => $request->iban,
                                    'adress'                      => $request->adress,
                                    'image'                       => $path,
                                    'note_p'                      => $request->password ,
                                ]);  
                            }
                            else{
                                User::find($id)->update([
                                    'name'     => $request->name,
                                    'email'    => $request->email,
                                    'password' => Hash::make($request->password),
                                    'phone1'                      => $request->phone1,
                                    'iban'                        => $request->iban,
                                    'adress'                      => $request->adress,
                                    'image'                       => $path,
                                    'note_p'                      => $request->password ,
                                    'rate'                      => $request->rate
                                ]);
                            }


                       
                             //بحال أراد إضافة متعاقد 
                             //!! غير فعالة الآن تم الغائها من الواجهة , بحيث لما بتم انشاء مزارع دون متعاقد لايمكن الاضافة مرة ثانية بالتعديل
                             if($request['key']=='1' and isset($request['name1']) )
                             {
                                $user1=User::where('farmer_id',$user->id)->first();

                                //بحال المتعاقد موجود 
                                if($user1){


                                       // التحقق من صحة الأيميل المحذث 
                                    if($request->email1 != $user1->email){
                                        $u  =  User::where('email' , $request->email1)->first();
                                        if($u)
                                        {
                                            $msg=" الإيميل موجود مسبقاً للمتعاقد ";
                                            return redirect()->back()->withInput()->with('error', $msg);
                                        }

                                    }

                                         $file = $request->file('image');
                                         $path = $user->image;

                                        //بحال قام المتعاقد  بتحديث الصورة 
                                        if(isset($file)){

                                    
                                        // Generate a file name with extension
                                        $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
                        
                                        // Save the file
                                        $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/المتعاقدون/'.$request['name1'], $fileName);
                                    
                    }
                                                //جلب الفواتير والتحقق بحال لو كان المزارع يملك فواتير , لانستطيع تحديث نسبته
                                                $bills  = Bill::where("farmer_id" , $id )->get();
                                                //بحال كان صاحب الفواتير المتعاقد
                                                $bills2 = Bill::where("farmer_id" , User::where("farmer_id",$id )->first()->id )->get();
                                                if(count($bills) || count($bills2 ))
                                                {

                                    User::find($user1->id)->update([
                                        'name'     => $request->name1,
                                        'email'    => $request->email1,
                                        'password' => Hash::make($request->password1),
                                        'phone1'                      => $request->phone11,
                                        'iban'                        => $request->iban1,
                                        'image'                       => $path,
                                        // 't3akdPrice'                  => $request->t3akdPrice,
                                        'note_p'                      => $request->password1,

                                    ]);
                                }
                                else
                                {   User::find($user1->id)->update([
                                    'name'     => $request->name1,
                                    'email'    => $request->email1,
                                    'password' => Hash::make($request->password1),
                                    'phone1'                      => $request->phone11,
                                    'iban'                        => $request->iban1,
                                    'image'                       => $path,
                                    // 't3akdPrice'                  => $request->t3akdPrice,
                                    'note_p'                      => $request->password1 ,
                                    'rate'                        => $request->rate1

                                ]);
                                }
                                }
                                 //بحال المتعاقد غير موجود وأراد الإضافة  
                                else
                                {

                                    $file = $request->file('image1');

                                    // Generate a file name with extension
                                    $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
                    
                                    // Save the file
                                    $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/المتعاقدون/'.$request['name1'], $fileName);
                          
                                    
                                     User::create([
                                        'name'     => $request->name1,
                                        'email'    => $request->email1,
                                        'password' => Hash::make($request->password1),
                                        'role'     => 7,
                                        'phone1'                      => $request->phone11,
                                        'iban'                        => $request->iban1,
                                        'company'                     => auth()->user()->id,
                                        'image'                       => $path,
                                        't3akdPrice'                  => $request->t3akdPrice,
                                        'farmer_id'                   => $user->id,
                                        'note_p'                      => $request->password1
                                    ]);

                                }
                                
                            }
        
        
                    if($user){ 
                        return redirect()->back()->with('success', 'تم التعديل  بنجاح');
                    }else{
                        return redirect('users')->with('error', 'هنالك خطأ ما يرجى المحاولة مرة أخرى ! ');
                    }
                }catch (\Exception $e) {
                    $bug = $e->getMessage();
                    return redirect()->back()->with('error', $bug);
                }
    }
 //*END* update  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>















 //*START* delete  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>

    public function delete($id)
    {
        $user  =  User::where('id',$id)->where('company',auth()->user()->id)->first();
        $user1 =  User::where('farmer_id',$user->id)->first();

        if(isset($user))
            $user->delete();

        if(isset($user1))
           $user1->delete();

        return redirect()->back()->withInput()->with('error', 'تم حذف المستخدم ');

    }
  //*START* delete  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>













   //*START* show  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>

    public function show()
    {
        try{

        $company  =  auth()->user()->id;

         //Filter
        if(isset($_GET['by']) && isset($_GET['type']))
        {
            $by   =  $_GET['by'];
            $type =  $_GET['type'];

            $users=User::where('company',company::company_id())->where('role',6)->orWhere('role',7)->orderBy(
                $by,$type)->get();
               
                return view('main.showTables.Farmer',with([
                    "users" => $users
                ]));        
        }
        //Search
        elseif(isset($_GET['key']) && isset($_GET['type']))
        {
          
             
                $type       =  $_GET['type'];
                $search_key =  $_GET['key'];
                
                $users=User::where('company',company::company_id())->where('role',6)->orWhere('role',7)->where(
                    $type , 'LIKE' ,'%'.$search_key.'%' )->get();
                   
                    return view('main.showTables.Farmer',with([
                        "users" => $users
                    ]));        
            }
        // Normal 
         else
            {
                $users=User::where('company',company::company_id())->where('role',6)->orWhere('role',7)->orderBy(
                    'id','DESC')->get();
                   
                    return view('main.showTables.Farmer',with([
                        "users" => $users
                    ]));        
            }

        }
        
        catch (\Exception $e) {

            return back();
        }
    }

 //*END* show  >>>>>>>>>   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>> >>>>>>>>>  >>>>>>>>>  >>>>>>>>>






}
