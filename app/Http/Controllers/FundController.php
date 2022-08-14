<?php

namespace App\Http\Controllers;

use App\Date;
use App\fund;
use Illuminate\Http\Request;
use App\helpers\company;

class FundController extends Controller
{

    //*START* >>>>>>>>>>
    public function show()
    {
        $items  = fund::orderBy('id', 'ASC')->where('company_id', company::company_id())->paginate(100);
        return  view("funds.index")->with("items", $items);
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 





    //*START* >>>>>>>>>>
    public function store(Request $request)
    {
        if (auth()->user()->role == 2) {
            fund::create([
                "name"        => $request->name,
                "company_id"  => auth()->user()->id,
    
            ]);
        }
        else
        {
            fund::create([
                "name"        => $request->name,
                "company_id"  => company::company_id() ,
    
            ]);
        }
        
        return redirect()->back()->with("msg", "تمت الإضافة بنجاح .");
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 




    //*START* >>>>>>>>>>
    public function edit($id)
    {

        $items  = fund::orderBy('id', 'ASC')->paginate(100);
        $item   = fund::find($id);
        return view("funds.index")->with([
            "items" => $items,
            "item"  => $item,
        ]);
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 




    //*START* >>>>>>>>>>
    public function update(Request $request, $id)
    {

        fund::where('id', $id)->where('company_id', company::company_id())->update([
            "name" => $request['name'],
        ]);
        return redirect()->back()->with('msg', 'تم التعديل بنجاح ');
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

    //*START* >>>>>>>>>>


    // public function delete(Request $request, $id)
    // {
    //     Date::where('id', $id)->where('company_id', company::company_id())->delete();
    //     return redirect()->back()->with('msg', 'تم الحذف بنجاح ');
    // }
    // //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

}
