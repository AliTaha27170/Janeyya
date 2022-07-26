<?php

namespace App\Http\Controllers;

use App\Date;
use Illuminate\Http\Request;
use App\helpers\company;

class DateController extends Controller
{
 
    //*START* >>>>>>>>>>
    public function show() 
    {
        $items  = Date::orderBy('id','DESC')->paginate(100);
        return view('main.showTables.dates')->with("items",$items);
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 


    
    //*START* >>>>>>>>>>
    public function add() 
    {
       return view('main.showTables.dates');
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

   
    //*START* >>>>>>>>>>
    public function store(Request $request) 
    {
        Date::create([
            "name"        =>$request->name ,
            "company_id"  =>auth()->user()->id ,
            
        ]);
        return redirect()->back()->with("msg","تمت الإضافة بنجاح .");
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 



       
    //*START* >>>>>>>>>>
    public function edit( $id) 
    {
       
        $items  = Date::orderBy('id','DESC')->paginate(100);
        $item   = Date::find($id);
        return view('main.showTables.dates')->with([
            "items" => $items ,
            "item"  => $item  ,
        ]);
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 



       
    //*START* >>>>>>>>>>
    public function update(Request $request,$id)
    {

        Date::where('id',$id)->where('company',company::company_id())->update([
            "name" => $request['name'] ,
        ]);
        return redirect()->back()->with('msg','تم التعديل بنجاح ');
    }
    //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

      //*START* >>>>>>>>>>

      
      public function delete(Request $request,$id)
      {
        Date::where('id',$id)->where('company',company::company_id())->delete();
        return redirect()->back()->with('msg','تم الحذف بنجاح ');
      }
      //*END*               >>>>>>>>>>           >>>>>>>>>          >>>>>>>>>>> 

}


