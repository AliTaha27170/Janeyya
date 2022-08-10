<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    public function index()
    {
        $expenses = Expenses::all();
        return view('expenses.index',compact('expenses'));
    }
    public function store(Request $request) 
    {
        $expenses = new Expenses();
        $expenses->description = $request->description;
        $expenses->price = $request->price;
        $expenses->save();
        return redirect()->back()->with('msg','تم الاضافة بنجاح');
    }
    public function edit($id)
    {
        $expens = Expenses::where('id', $id)->first();
        return view("expenses.edit",compact("expens"));
    }
    public function update(Request $request)
    {
        $expenses =  Expenses::findOrFail($request->id);
        $expenses->description = $request->description;
        $expenses->price = $request->price;
        $expenses->save();
        return redirect()->route('expenses.index')->with('msg','تم التعديل بنجاح');
    }

    public function delete($id)
    {
        $expens = Expenses::where('id', $id)->first();
        $expens->delete();
        return redirect()->back()->withInput()->with('msg', 'تم حذف مصاريف ');
    }

}
