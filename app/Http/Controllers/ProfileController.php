<?php

namespace App\Http\Controllers;

use App\Firm;
use App\Http\Requests\FirmRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        $firm_id = User::where('id', '=',auth()->user()->id)->select('firm_id')->first();
        $firm = Firm::where('id',$firm_id->firm_id)->first();
        return view('profile',compact('firm'));
    }
    
    public function Updateprofile(Request $request)
    {
        $firm =  Firm::findOrFail($request->id);
        $firm->name = $request->name;
        $firm->phone1 = $request->phone1;
        $firm->phone2 = $request->phone2;
        $firm->phone3 = $request->phone3;
        $firm->address = $request->address;
        $firm->link_map = $request->link_map;
        $firm->tax_reg_number = $request->tax_reg_number;
        $firm->save();
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $firm->clearMediaCollection('logo');
            $firm->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        return redirect()->back();
    }
}
