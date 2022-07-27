<?php

namespace App\Http\Controllers\Farmers;

use App\Bill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    { 
        $Invoices = Bill::where([
            ['farmer_id', '=' , auth()->user()->id],
        ])->get();
        return view('farmers.bills',compact('Invoices'));
    }
    
}
