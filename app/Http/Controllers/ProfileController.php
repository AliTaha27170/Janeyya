<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $user = User::findOrFail(auth()->user()->id);
        return view('profile',compact('user'));
    }
    
    public function Updateprofile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        // update user 

        $validator = Validator::make($request->all(), [
            'name'                          => 'required |string ',
            'email'                         => 'required|email ',
            'password'                      => 'nullable',
            'phone1'                        => 'required',
            'phone2'                        => 'nullable',
            'adress'                        => 'required',
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
            // store user information
            $user = User::findOrFail(auth()->user()->id)->update([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'password' => Hash::make($request->password),
                    'phone1'                      => $request->phone1,
                    'phone2'                        => $request->phone2,
                    'adress'                      => $request->adress,
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
}
