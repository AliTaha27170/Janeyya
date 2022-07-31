<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getDeptAccount(){
        return view('Accounts.accountDetectingDebts.account_dept');
    }
    public function getItemAccount(){
        return view('Accounts.accountItems.account_item');
    }
    public function AccountController(){
        return view('Accounts.Account_for_all_accounts.account_statement');
    }
    
}
