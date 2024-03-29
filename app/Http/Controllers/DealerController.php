<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\helpers\company;

class DealerController extends Controller
{
    public function add()
    {
        return view('main.Store&Edit.Dealer');
    }
 
//*START* Store new dealer   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>
    public function store(Request $request)
    {
        // create user 
        
        $validator = Validator::make($request->all(), [
            'name'                          => 'required | string ',
            'email'                         => 'required | email | unique:users',
            'password'                      => 'required ',
            'CommercialRegistrationNo'      => 'required',
            'phone1'                        => 'required',
            'image'                         =>  'required',
            'iban'                          => 'required',
            'company_name'                  => 'required',
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
                $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/التجار/'.$request['name'], $fileName);
              
           
            
            // store user information
            $user = User::create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'password' => Hash::make($request->password),
                        'role'     => 8,
                        'CommercialRegistrationNo'    => $request->CommercialRegistrationNo,
                        'phone1'                      => $request->phone1,
                        'iban'                        => $request->iban,
                        'adress'                      => $request->adress,
                        'company'                     => auth()->user()->id,
                        'company_name'                => $request->company_name,
                        'image'                       => $path,
                        'note_p'                      => $request->password
                    ]);



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
//*END* Store new dealer   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>

 
    public function edit($id)
    {
        $user=User::where('id',$id)->where('company',auth()->user()->id)->where('role',8)->first();
        if(!$user)
            return back();
       
        return view('main.Store&Edit.Dealer')->with('user',$user);
    }
 
    public function update(Request $request,$id)
    {
        $user=User::find($id);

        if($user->company != auth()->user()->id && $user->role ==8 )
            return back();

                // update user 
        
                $validator = Validator::make($request->all(), [
                    'name'                          => 'required | string ',
                    'email'                         => 'required | email ',
                    'password'                      => 'required ',
                    'CommercialRegistrationNo'      => 'required',
                    'phone1'                        => 'required',
                    'iban'                          => 'required',
                    'image'                         => 'image',
                    'company_name'                  => 'required',
                ]
               
            );
                
                if($validator->fails()) {
                    return redirect()->back()->withInput()->with('error', $validator->messages()->first());
                }
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
                        if(isset($file)){

                       
                        // Generate a file name with extension
                        $fileName = 'profile-'.time().'.'.$file->getClientOriginalExtension();
        
                        // Save the file
                        $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/التجار/'.$request['name'], $fileName);
                      
                    }
                    
                    // store user information
                    $user = User::find($id)->update([
                                'name'     => $request->name,
                                'email'    => $request->email,
                                'password' => Hash::make($request->password),
                                'CommercialRegistrationNo'    => $request->CommercialRegistrationNo,
                                'phone1'                      => $request->phone1,
                                'iban'                        => $request->iban,
                                'adress'                      => $request->adress,
                                'company_name'                => $request->company_name,
                                'image'                       => $path,
                                'note_p'                      => $request->password
                            ]);
        
        
        
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
 
    public function delete($id)
    {
        $user=User::where('id',$id)->where('company',auth()->user()->id)->first();
        $user->delete();
        return redirect()->back()->withInput()->with('error', 'تم حذف المستخدم ');

    }
 
    public function show()
    {
        try{

        $company  =  auth()->user()->id;

         //Filter
        if(isset($_GET['by']) && isset($_GET['type']))
        {
            $by   =  $_GET['by'];
            $type =  $_GET['type'];

            $users=User::where('company',company::company_id())->where('role','8')->orderBy(
                $by,$type)->get();
               
                return view('main.showTables.Dealer',with([
                    "users" => $users
                ]));        
        }
        //Search
        elseif(isset($_GET['key']) && isset($_GET['type']))
        {
          
             
                $type       =  $_GET['type'];
                $search_key =  $_GET['key'];
                
                $users=User::where('company',company::company_id())->where('role','8')->where(
                    $type , 'LIKE' ,'%'.$search_key.'%' )->get();
                   
                    return view('main.showTables.Dealer',with([
                        "users" => $users
                    ]));        
            }
        // Normal 
         else
            {
                $users=User::where('company',company::company_id())->where('role','8')->orderBy(
                    'id','DESC')->get();
                   
                    return view('main.showTables.Dealer',with([
                        "users" => $users
                    ]));        
            }

        }
        
        catch (\Exception $e) {

            return back();
        }
    }



}
