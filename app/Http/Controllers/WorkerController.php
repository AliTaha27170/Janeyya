<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\helpers\company;

class WorkerController extends Controller
{
    public function add()
    {
        return view('main.Store&Edit.Worker');
    }
 
//*START* Store new Worker   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>
    public function store(Request $request)
    {
        // create user 
        
        $validator = Validator::make($request->all(), [
            'name'                          => 'required | string ',
            'email'                         => 'required | email | unique:users',
            'password'                      => 'required ',
            'salary'                        => 'required',
            'phone1'                        => 'required',
            'image'                         =>  'required',
            'iban'                          => 'required',
            'DurationContract'                  => 'required',
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
                $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/الموظفون/'.$request['name'], $fileName);
              
           
            
            // store user information
            $user = User::create([
                        'name'     => $request->name,
                        'email'    => $request->email,
                        'password' => Hash::make($request->password),
                        'role'     => 3,
                        'salary'    => $request->salary,
                        'phone1'                      => $request->phone1,
                                'phone2'                      => $request->phone2,
                        'iban'                        => $request->iban,
                        'company'                     => auth()->user()->id,
                        'DurationContract'                => $request->DurationContract,
                        'image'                       => $path,
                        'note_p'                      => $request->password
                    ]);

                    $this->roleCheck($request,$user->id);


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
//*END* Store new Worker   >>>>>>>>>   >>>>>>>>>   >>>>>>>>>

 
    public function edit($id)
    {
        $user=User::where('id',$id)->where('company',auth()->user()->id)->where('role',3)->first();
        if(!$user)
            return back();
       
        return view('main.Store&Edit.Worker')->with('user',$user);
    }
 
    public function update(Request $request,$id)
    {
        $user=User::find($id);

        if($user->company != auth()->user()->id && $user->role ==3 )
            return back();

                // update user 
        
                $validator = Validator::make($request->all(), [
                    'name'                          => 'required | string ',
                    'email'                         => 'required | email ',
                    'password'                      => 'required ',
                    'salary'                        => 'required',
                    'phone1'                        => 'required',
                    'iban'                          => 'required',
                    'image'                         => 'image',
                    'DurationContract'              => 'required',
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
                        $path = $file->storeAs(''.'/صور الهوية'.'/'.auth()->user()->name.'/الدلال/'.$request['name'], $fileName);
                      
                    }
                    
                    // store user information
                    $user = User::find($id)->update([
                                'name'     => $request->name,
                                'email'    => $request->email,
                                'password' => Hash::make($request->password),
                                'salary'    => $request->salary,
                                'phone1'                      => $request->phone1,
                                'phone2'                      => $request->phone2,

                                'iban'                        => $request->iban,
                                'DurationContract'            => $request->DurationContract,
                                'image'                       => $path,
                                'note_p'                      => $request->password
                            ]);
        
                            $this->roleCheck($request,$id);
        
        
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

            $users=User::where('company',company::company_id())->where('role','3')->orderBy(
                $by,$type)->get();
               
                return view('main.showTables.Worker',with([
                    "users" => $users
                ]));        
        }
        //Search
        elseif(isset($_GET['key']) && isset($_GET['type']))
        {
          
             
                $type       =  $_GET['type'];
                $search_key =  $_GET['key'];
                
                $users=User::where('company',company::company_id())->where('role','3')->where(
                    $type , 'LIKE' ,'%'.$search_key.'%' )->get();
                   
                    return view('main.showTables.Worker',with([
                        "users" => $users
                    ]));        
            }
        // Normal 
         else
            {
                $users=User::where('company',company::company_id())->where('role','3')->orderBy(
                    'id','DESC')->get();
                   
                    return view('main.showTables.Worker',with([
                        "users" => $users
                    ]));        
            }

        }
        
        catch (\Exception $e) {

            return back();
        }
    }



    //*START* roleCheck    >>>>>>>>>   >>>>>>>>>   >>>>>>>>>

    public function roleCheck(Request $request , $u_id)
    {
   
        for ($i=1; $i <=6 ; $i++) { 
           

                    if(isset($request['a'.$i]) && $request['a'.$i]=="on" )
                         $this->roleCheckStore($i,'edit',$u_id,1);
                    else
                        $this->roleCheckStore($i,'edit',$u_id);

                        
                            if(isset($request['b'.$i]) && $request['b'.$i]=="on" )
                            $this->roleCheckStore($i,'delete',$u_id,1);
                    else
                        $this->roleCheckStore($i,'delete',$u_id);


                   
                        if(isset($request['c'.$i]) && $request['c'.$i]=="on" )
                        $this->roleCheckStore($i,'read',$u_id,1);
                    else
                        $this->roleCheckStore($i,'read',$u_id);

                
      
            
        }
      

    }
  //*End* roleCheck    >>>>>>>>>   >>>>>>>>>   >>>>>>>>>

   
  public function roleCheckStore($id,$type,$u_id,$check=0)
  {
            $r  =  Roles::where("userId",$u_id)->where("partId",$id)->first();
            if ($r) {
                $r->$type=$check;
                $r->save();
            }
            else
            {
                Roles::create([
                    "userId"   =>  $u_id  ,
                    "partId"   =>  $id ,
                    $type      =>  $check ,
                ]);
            }

      
  }




}
