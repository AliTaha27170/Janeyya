<?php

namespace App\helpers;

use App\Bill;

class bills {
    // اشعار بالفواتير الجديدة
    static public function bill_new ()
    {

       $count = Bill::where('company_id',company::company_id())->where('notfic',1)->get();
       return count($count);
    }
}