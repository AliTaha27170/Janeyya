<?php

namespace App\helpers;

use App\Bill;
use App\User;
use App\Catch_Receipt_proc;

class users {
    // ماعلى المستخدم من فواتير 
    static public function on_him_update( $id)
    {
        $bills = null;
        $user  = User::find($id);
        $catch = Catch_Receipt_proc::where('user_id' , $id)->get();
        $bills_total = 0;
        $catch_total = 0;

        //بحال كان تاجر
        if($user->role == 8)
        {
         //بحال كان تاجر فوسيلة الدفع آجل لتضاف على زمته مبلغ
           $bills = Bill::where('pay_type' , 1)->where('dealer_id',$id)->where('bill_id', null)->get();
        }
        else 
        {
          //بحال كان كاتب أو موظق من الشركة  فوسيلة الدفع نقدي  لتضاف على زمته مبلغ
            $bills = Bill::where('pay_type' , 2)->where('who_write',$id)->get();
        }

        foreach ($bills as $bill) {
           $bills_total += (float) $bill->total;
        }

        foreach ($catch as $item) {
            $catch_total += (float) $item->the_amount;
         }

         $up = $bills_total - $catch_total ;

         user::find($id)->update(
             [
                 "up" => $up
             ]
            );
        return $up ;

    }

    /*
    مجموع الفواتير ناقص ما دفع المستخدم 
    */


}