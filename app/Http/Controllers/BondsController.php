<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bond;
use Illuminate\Http\Request;
use App\Traits\BondsTrait;


class BondsController extends Controller
{
    use BondsTrait;

  public function store(Request $request , $type )
  {
    $request->validate([
        'company_id' => 'required',
        'user_id'   => 'required',

    ]);
    
    //حساب الأصول للمزارع أو للتاجر 
    $assets = $this->assets($request['user_id']);

    Bill::create([
        "type"          => $type ,
        "user_id"       => $request['user_id'] ,
        "company_id"    => $request['company_id'] ,
        "for_him"       => $assets >= 0 ? $assets : null,
        "from_him"      => $assets <= 0 ? $assets : null ,
        "pay_him"       => $request['pay_him'] ?? null,
        "tack_from_him" => $request['tack_from_him'] ?? null,
        "details"       => $request['details'] ,
    ]);


  }
}
