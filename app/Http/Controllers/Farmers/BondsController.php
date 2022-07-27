<?php

namespace App\Http\Controllers\Farmers;

use App\Bond;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BondsController extends Controller
{
    public function index()
    { 
        $bonds = Bond::where([
            ['user_id', '=' , auth()->user()->id],
            ['type', '=' , 0],
        ])->get();
        $for_him = $bonds->sum("for_him");
        $take_from_him= $bonds->sum("tack_from_him");
        return view('delars.bonds',compact('bonds','take_from_him','for_him'));
    }
    public function getBonds1()
    { 
        $bonds = Bond::where([
            ['user_id', '=' , auth()->user()->id],
            ['type', '=' , 1],
        ])->get();
        $for_him = $bonds->sum("for_him");
        $take_from_him= $bonds->sum("tack_from_him");
        return view('delars.bonds1',compact('bonds','take_from_him','for_him'));
    }

    public function getBondsDate(Request $request)
    {
        $start_at = date($request->from);
        $end_at = date($request->to);
        $bonds = Bond::whereBetween('created_at',[$start_at,$end_at])->where([
            ['user_id', '=' , auth()->user()->id],
            ['type', '=' , 1],
        ])->get();
        $for_him = $bonds->sum("for_him");
        $take_from_him= $bonds->sum("tack_from_him");
        return view('delars.bonds1',compact('bonds','take_from_him','for_him'));
    }
    public function getBondsDateReceipt(Request $request)
    {
        $start_at = date($request->from);
        $end_at = date($request->to);
        $bonds = Bond::whereBetween('created_at',[$start_at,$end_at])->where([
            ['user_id', '=' , auth()->user()->id],
            ['type', '=' , 0],
        ])->get();
        $for_him = $bonds->sum("for_him");
        $take_from_him= $bonds->sum("tack_from_him");
        return view('delars.bonds1',compact('bonds','take_from_him','for_him'));
    }

}
