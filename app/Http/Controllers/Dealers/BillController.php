<?php

namespace App\Http\Controllers\Dealers;

use App\Bill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    { 
        $Invoices = Bill::where([
            ['dealer_id', '=' , auth()->user()->id],
        ])->get();
        return view('delars.bills',compact('Invoices'));
    }
    
}
