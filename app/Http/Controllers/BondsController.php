<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bond;
use App\fund;
use App\Move;
use Illuminate\Http\Request;
use App\Traits\BondsTrait;
use App\Traits\CompanyTrait;
use App\User;
use App\helpers\company;

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
        ->whereBetween('created_at', [$request["from"], $request["to"]])->orderBy("id","DESC")->paginate(100);
    else
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 0)->orderBy("id","DESC")->paginate(100);

    $assets = $bonds->sum("assets");
    $pay_him  = $bonds->sum("pay_him");

    return view('bonds.receipts_table', compact('bonds', 'assets', 'pay_him'));
  }



  // واجهة إضافة سند صرف  جدبد 
  public function Catch_Receipt()
  {
    $company_id = $this->company_id();
    $users  = User::where("company", $company_id)->where("role", "!=", 2)
      ->where("role", "!=", 1)->orderBy("id","DESC")->paginate(100);
      $funds  = fund::where("company_id", $company_id)->get();

    return view("bonds.catch_receipt", compact("company_id", "users","funds"));
  }



  // واجهة إضافة سند قبض  جدبد 
  public function receipt()
  {
    $company_id = $this->company_id();
    $users  = User::where("company", $company_id)->where("role", "!=", 2)
      ->where("role", "!=", 1)->orderBy("id","DESC")->paginate(100);

      $funds  = fund::where("company_id", $company_id)->get();

    return view("bonds.receipt", compact("company_id", "users" , "funds"));
  }

  // جدول سندات القبض
  public function Catch_Receipts_table()
  {
    if (isset($request["start_at"]) and isset($request["end_at"]))
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 1)
        ->whereBetween('created_at', [$request["from"], $request["to"]])->orderBy("id","DESC")->paginate(25);
    else
      $bonds  = Bond::where("company_id", $this->company_id())->where("type", 1)->orderBy("id","DESC")->paginate(25);

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
    $fund_name = fund::find($request["fund_id"])->name;


    Bond::create([
      "type"          => $type,
      "user_id"       => $request['user_id'],
      'role'          => $role,
      "company_id"    => $company_id,
      "amount"       => $request['amount'] ,
      "details"       => $request['details']  ,
      "name_of_user"  => $name_of_user,
      "fund_id"       => $request['fund_id'],
      "fund_name"     => fund::find($request['fund_id'])->name,
      
    ]);

    //تفاصيل الكشف
      $details = ($type ? "سند قبض " : "سند صرف  ") . ($type ? " إلى " : " من ")  . $fund_name  . (isset($request['details'] ) and $request['details'] !=''? " | " . $request['details']: "" );

    $user = User::where('company', $this->company_id())->where("id", $request["user_id"])->get()->first();
    // الصندوق       
    $fund = fund::where('company_id', $this->company_id())->where("id", $request["fund_id"] )->get()->first();
    

    if ($fund->assets < $request['amount']  and !$type) {
      return redirect()->back()->with("error", " المبلغ المطلوب أكبر من المبلغ الموجود !");

    }
         //type 
      // هي نوع  سند الصرف 0
      // هي نوع  سند القبض 1

      // تحديث ذمة المستخدم

      $assets =  $type ?  $assets + $request['amount'] :   $assets  - $request['amount'] ;

      $user->update(
        [
          "assets" =>  $assets  ,
        ]
      );
 
 
      // تحديث ذمة الصندوق
      $fund->update(
        [
          "assets" =>  $type ? $fund->assets + $request['amount'] :  $fund->assets - $request['amount']  ,
        ]
      );


                                  
                //إضافة للكشوف الخاصة بالمستخدم  
                Move::create([

                  "from_him" => !$type ?  $request['amount']  : 0  ,
                  "for_him"  =>  $type ? ($request['amount'] ) : 0 ,

                  "pay_him"  =>  $assets > 0 ?  $assets : 0,
                  "tack_from_him"  => $assets < 0 ?  abs($assets) : 0 ,

                  "fund_id"    => $request["fund_id"]  ,
                  "company_id" => company::company_id() ,
                  "user_id"    => $request['user_id'],

                  "details" => $details  ,
                  "user_name" => $user->name  ,

              ]);


    return redirect()->back()->with("msg", "تمت العملية بنجاح ");
  }
}
