<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function add()
    {
      return view('main.Store&Edit.Company');
    }
 
    public function store(Request $request)
    {
        # code...
    }
 
    public function edit($id)
    {
        # code...
    }
 
    public function update(Request $request,$id)
    {
        # code...
    }
 
    public function delete($id)
    {
        # code...
    }
 
    public function show()
    {
       return view('main.showTables.Company');
    }
}
