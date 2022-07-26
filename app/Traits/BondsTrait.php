<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;

trait BondsTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function assets ($user_id) {
                
       return (User::find($user_id)->assets) ;
    }


}