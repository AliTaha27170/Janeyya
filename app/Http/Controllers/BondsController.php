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
    public function receipts_table ( )
    {
      $bonds  = Bond::where("type",0)->orderBy("id")->paginate(100);
      return view("bonds.receipts_table",compact("bonds"));
    
    }  

        // واجهة إضافة سند صرف  جدبد 
        public function receipt ( )
        {
          $company_id = $this->company_id() ;
          $users  = User::where("company","company_id")->orderBy("id")->paginate(100);
          return view("bonds.receipt",compact("company_id","users"));
        
        }  
    

        



    // جدول سندات القبض
    public function Catch_Receipts_table ( )
    {
      $bonds  = Bond::where("type",1)->orderBy("id")->paginate(100);
      return view("bonds.receipts_table",compact("bonds"));
    
    }  



    
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
        "for_him"       => $assets >= 0 ? $assets : 0,
        "from_him"      => $assets <= 0 ? $assets : 0 ,
        "pay_him"       => $request['pay_him'] ?? null,
        "tack_from_him" => $request['tack_from_him'] ?? null,
        "details"       => $request['details'] ,
    ]);


  }
}
