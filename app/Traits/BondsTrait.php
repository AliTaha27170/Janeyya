<?php

namespace App\Traits;

use App\User;
use Illuminate\Http\Request;

trait BondsTrait
{

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function user($user_id, $name)
    {

        $user =  User::find($user_id);
        return $user['' . $name];
    }
}
