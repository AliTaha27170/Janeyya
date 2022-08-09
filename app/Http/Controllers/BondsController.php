<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bond;
use Illuminate\Http\Request;
use App\Traits\BondsTrait;
use App\Traits\CompanyTrait;
use App\User;

use function PHPSTORM_META\type;

class BondsController extends Controller
{
  use BondsTrait;
  use CompanyTrait;


  // جدول سندات الصرف 
  public function receipts_table(Request $request)
  {


    // التاريخ 
    if (isset($request["start_at"]) and isset($request["end_at"]))
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 0)
        ->whereBetween('created_at', [$request["from"], $request["to"]])->orderBy("id")->paginate(100);
    else
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 0)->orderBy("id")->paginate(100);

    $assets = $bonds->sum("assets");
    $pay_him  = $bonds->sum("pay_him");

    return view('bonds.receipts_table', compact('bonds', 'assets', 'pay_him'));
  }



  // واجهة إضافة سند صرف  جدبد 
  public function Catch_Receipt()
  {
    $company_id = $this->company_id();
    $users  = User::where("company", $company_id)->where("role", "!=", 2)
      ->where("role", "!=", 1)->orderBy("id")->paginate(100);

    return view("bonds.catch_receipt", compact("company_id", "users"));
  }



  // واجهة إضافة سند قبض  جدبد 
  public function receipt()
  {
    $company_id = $this->company_id();
    $users  = User::where("company", $company_id)->where("role", "!=", 2)
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

    $assets = $bonds->sum("assets");
    $tack_from_him  = $bonds->sum("tack_from_him");

    return view('bonds.Catch_Receipts_table', compact('bonds', 'assets', 'tack_from_him'));
  }





  //معالجة وتخزين السند 

  public function bond(Request $request, $type)
  {
    $request->validate([
      'user_id'   => 'required',
    ]);

    //حساب الأصول للمزارع أو للتاجر 
    $assets       = $this->user($request['user_id'], "assets");
    $name_of_user = $this->user($request['user_id'], "name");
    $role         = $this->user($request['user_id'], "role");
    $company_id   = $this->company_id();


    Bond::create([
      "type"          => $type,
      "user_id"       => $request['user_id'],
      'role'          => $role,
      "company_id"    => $company_id,
      "assets"        => $assets ,//$request['pay_him'] ? $assets-$request['pay_him'] : $assets+$request['tack_from_him'],
      "pay_him"       => $request['pay_him'] ?? null,
      "tack_from_him" => $request['tack_from_him'] ?? null,
      "details"       => $request['details'],
      "name_of_user"  => $name_of_user,
    ]);

    if ($type) {
      $user = User::where('company', $this->company_id())->where("id", $request["user_id"])->get()->first();
      $user->update(
        [
          "assets" => $user->assets + $request['tack_from_him'],
        ]
      );
    } else
      //' '      صرف
      $user = User::where('company', $this->company_id())->where("id", $request["user_id"])->get()->first();
    $user->update(
      [
        "assets" => $user->assets - $request['pay_him'],
      ]
    );

    //'شركة '      صرف
    $user = User::where('id', $this->company_id())->get()->first();
    $user->update(
      [
        "assets" => $user->assets - $request['pay_him'],
      ]
    );

    return redirect()->back()->with("msg", "تمت الإضافة بنجاح .");
  }
}
