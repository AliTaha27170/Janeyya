<?php

namespace App\Http\Controllers;

use App\Firm;
use App\Http\Requests\FirmRequest;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    public function index() 
    {
        $firms = Firm::all();
        return view("firm.index",compact("firms"));
    }

    public function create()
    {
        return view("firm.create");
    }
    public function store(FirmRequest $request)
    {
       

      
      
        $firm = new Firm();
        $firm->name = $request->name;
        $firm->phone1 = $request->phone1;
        $firm->phone2 = $request->phone2;
        $firm->phone3 = $request->phone3;
        $firm->address = $request->address;
        $firm->link_map = $request->link_map;
        $firm->tax_reg_number = $request->tax_reg_number;
        $firm->save();
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $firm->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
        return redirect()->route('firm.index');
    }
    public function edit($id)
    {
        $firm = Firm::where('id', $id)->first();
        return view("firm.edit",compact("firm"));
    }
    public function update(FirmRequest $request)
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
        return redirect()->route('firm.index');
    }

    public function delete($id)
    {
        $firm=Firm::where('id',$id)->first();
        $firm->delete();
        return redirect()->back()->withInput()->with('error', 'تم حذف الشركة ');
    }

}
