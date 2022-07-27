<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;

trait CompanyTrait {

    //تحديد رقم الشركة (موظف او صاحب الشركة)
     public function company_id ()
    {

        if(auth()->user()->role == 2 )
            $company = auth()->user()->id;
        else
            $company = auth()->user()->company;

        return   $company  ;
    }

}