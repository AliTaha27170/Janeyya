<?php

namespace App\Http\Controllers\Revenues;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RevenuesController extends Controller
{
    public function getQuest(){
        return view('Revenues.quest');
    }
    public function getFee(){
        return view('Revenues.fees');
    }
    public function getContract(){
        return view('Revenues.contracts');
    }
    public function getFine(){
        return view('Revenues.fines');
    }

}
