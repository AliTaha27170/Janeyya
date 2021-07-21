<?php

namespace App\helpers;


class company {
    //تحديد رقم الشركة (موظف او صاحب الشركة)
    static public function company_id ()
    {
        if(auth()->user()->role == 2 )
            $company = auth()->user()->id;
        else
            $company = auth()->user()->company;

        return $company ;
    }
}