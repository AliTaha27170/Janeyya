<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bond;
use Illuminate\Http\Request;
use App\Traits\BondsTrait;
use App\Traits\CompanyTrait;
use App\User;

class BondsController extends Controller
{
  use BondsTrait;
  use CompanyTrait;


  // جدول سندات الصرف 
  public function receipts_table(Request $request)
  {

    if (isset($request["start_at"]) and isset($request["end_at"]))
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 0)
        ->whereBetween('created_at', [$request["from"], $request["to"]])->orderBy("id")->paginate(100);
    else
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 0)->orderBy("id")->paginate(100);

    $for_him = $bonds->sum("for_him");
    $pay_him  = $bonds->sum("pay_him");

    return view('bonds.receipts_table', compact('bonds', 'for_him', 'pay_him'));
  }


  
  // واجهة إضافة سند صرف  جدبد 
  public function Catch_Receipt()
  {
    $company_id = $this->company_id();
    $users  = User::where("company", $company_id)->where("role", "!=", 271)
      ->where("role", "!=", 1)->orderBy("id")->paginate(100);

    return view("bonds.receipt", compact("company_id", "users"));
  }



  // واجهة إضافة سند قبض  جدبد 
  public function receipt()
  {
    $company_id = $this->company_id();
    $users  = User::where("company", $company_id)->where("role", "!=", 271)
      ->where("role", "!=", 1)->orderBy("id")->paginate(100);
      
    return view("bonds.receipt", compact("company_id", "users"));
  }



  // جدول سندات القبض
  public function Catch_Receipts_table()
  {
    if (isset($request["start_at"]) and isset($request["end_at"]))
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 1)
        ->whereBetween('created_at', [$request["from"], $request["to"]])->orderBy("id")->paginate(100);
    else
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 1)->orderBy("id")->paginate(100);

    $from_him = $bonds->sum("from_him");
    $tack_from_him  = $bonds->sum("tack_from_him");

    return view('bonds.Catch_Receipts_table', compact('bonds', 'from_him', 'tack_from_him'));
  }





  //معالجة وتخزين السند 

  public function store(Request $request, $type)
  {
    $request->validate([
      'user_id'   => 'required',
    ]);

    //حساب الأصول للمزارع أو للتاجر 
    $assets       = $this->user($request['user_id'], "assets");
    $name_of_user = $this->user($request['user_id'], "name");
    $company_id   = $this->company_id();
    $role = User::find($request['user_id'])->select('role')->get();

    Bill::create([
      "type"          => $type,
      "user_id"       => $request['user_id'],
      'role'          => $role,
      "company_id"    => $company_id,
      "for_him"       => $assets >= 0 ? $assets : 0,
      "from_him"      => $assets <= 0 ? $assets : 0,
      "pay_him"       => $request['pay_him'] ?? null,
      "tack_from_him" => $request['tack_from_him'] ?? null,
      "details"       => $request['details'],
      "name_of_user"  => $name_of_user,
    ]);
  }
}
