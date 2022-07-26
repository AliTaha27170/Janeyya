<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\helpers\company;

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
            'email'                         => 'required | email | unique:users',
            'password'                      => 'required ',
            'phone1'                        => 'required',
            'image'                         =>  'required',
            'iban'                          => 'required',
            'adress'                        => 'required',
        ]
       
    );
        
        if($validator->fails()) {
            return redirect()->back()->withInput()->with('error', $validator->messages()->first());
        }
        try
        {
            
                $file = $request->file('image');

                // Generate a file name with extension
                $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();

                // Save the file
                $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/المزارعون/'.$request['name'], $fileName);
              
           
            
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
                        'note_p'                      => $request->password
                    ]);

                    //بحال هنالك متعاقد 
                    if($request['key']=='1')
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
       
        return view('main.Store&Edit.Farmer')->with([
            "user" => $user,
            "user1"=>$user1,
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
                
                    
                     User::find($id)->update([
                                'name'     => $request->name,
                                'email'    => $request->email,
                                'password' => Hash::make($request->password),
                                'phone1'                      => $request->phone1,
                                'iban'                        => $request->iban,
                                'adress'                      => $request->adress,
                                'image'                       => $path,
                                'note_p'                      => $request->password
                            ]);
                       
                             //بحال أراد إضافة متعاقد 
                             if($request['key']=='1')
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
                                    User::find($user1->id)->update([
                                        'name'     => $request->name1,
                                        'email'    => $request->email1,
                                        'password' => Hash::make($request->password1),
                                        'phone1'                      => $request->phone11,
                                        'iban'                        => $request->iban1,
                                        'image'                       => $path,
                                        't3akdPrice'                  => $request->t3akdPrice,
                                        'note_p'                      => $request->password1
                                    ]);
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

            $users=User::where('company',company::company_id())->where('role',6)->orderBy(
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
                
                $users=User::where('company',company::company_id())->where('role',6)->where(
                    $type , 'LIKE' ,'%'.$search_key.'%' )->get();
                   
                    return view('main.showTables.Farmer',with([
                        "users" => $users
                    ]));        
            }
        // Normal 
         else
            {
                $users=User::where('company',company::company_id())->where('role',6)->orderBy(
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
