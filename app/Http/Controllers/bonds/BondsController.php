<?php

namespace App\Http\Controllers\bonds;

use App\Bond;
use App\Http\Controllers\Controller;
use App\Move;
use App\Traits\CompanyTrait;
use App\User;
use Illuminate\Http\Request;

class BondsController extends Controller
{
    use CompanyTrait;
    public function getBonds($id, Request $request){
        $role = $id;
        if($role ==6 )
            //جلب المزارعين والمتعاقدين (المزارعين المستأجرين)
            $users = User::where("company", $this->company_id())->where("role",$role)->orWhere("role",7)->orderBy("id")->get();
        else
            $users = User::where("company", $this->company_id())->where("role",$role)->orderBy("id")->get();

        if($id ==8 )
        {
            if(!isset($request['user']) || $request['user'] =='')
            {
                $moves = [];
                return view('Accounts.accountBonds.bondsDealer', compact('moves','role','users'));
            }

            $user =   $user = User::where("company", $this->company_id())->where("id",$request['user'])->get()->first();

            $asset =$user->assets;

            $moves  = Move::where("company_id", $this->company_id())->where("user_id", $request['user'])->get();


            $from_him = $moves->sum("from_him");
            $tack_from_him = ($asset  < 0 ? abs($asset) : 0 );

            $for_him = $moves->sum("for_him");
            $pay_him = ($asset  > 0 ? $asset : 0) ;

            return view('Accounts.accountBonds.bondsDealer', compact('moves', 'from_him', 'tack_from_him',
            
            'pay_him','for_him','role','users' , 'user'));



        }
        elseif( $id == 6){

            if(!isset($request['user']))
            {
                $moves = [];
                return view('Accounts.accountBonds.bondsFarmer', compact('moves','role','users'));
            }

            $user =   $user = User::where("company", $this->company_id())->where("id",$request['user'])->get()->first();

            $asset =$user->assets;

            $moves  = Move::where("company_id", $this->company_id())->where("user_id", $request['user'])->get();

         
            $from_him = $moves->sum("from_him");
            $tack_from_him = ($asset  < 0 ? abs($asset) : 0 );

            $for_him = $moves->sum("for_him");
            $pay_him = ($asset  > 0 ? $asset : 0) ;

            return view('Accounts.accountBonds.bondsFarmer', compact('moves', 'from_him', 'tack_from_him',
            
            'pay_him','for_him','role','users' , 'user'));

            
        }

        if($id == 6 || $id == 8){
            //!! للتعديل على الكل 
            if (isset($request["start_at"]) and isset($request["end_at"]))
                $bonds  = Move::where("company_id", $this->company_id())->where("role", $id)
                ->whereBetween('created_at', [$request["from"], $request["to"]])->orderBy("id")->paginate(100);
            elseif(isset($request["user"]))
                $bonds  = Bond::where("company_id", $this->company_id())->where("role",$id)->where("user_id",$request["user"])->orderBy("id")->paginate(100);
            else
                $bonds  = Bond::where("company_id", $this->company_id())->where("role",$id)->orderBy("id")->paginate(100);
        
            $from_him = $bonds->sum("from_him");
            $tack_from_him  = $bonds->sum("tack_from_him");
            $role = $id;
            $users = User::where("company", $this->company_id())->where("role",$role)->select("name","id")->orderBy("id")->get();
            if($role == 6){
                
                return view('Accounts.accountBonds.bondsFarmer', compact('bonds', 'from_him', 'tack_from_him','role','users'));
            } else {
                return view('Accounts.accountBonds.bondsDealer', compact('bonds', 'from_him', 'tack_from_him','role','users'));
            }
        } 
        if($id == 1){
            if (isset($request["start_at"]) and isset($request["end_at"]))
                $bonds  = Bond::where("company_id", $this->company_id())
                ->whereBetween('created_at', [$request["from"], $request["to"]])->where("role", "!=", 6)->where("role", "!=", 8)->orderBy("id")->paginate(100);
            elseif(isset($request["user"]))
                $bonds  = Bond::where("company_id", $this->company_id())->where("role", "!=", 6)->where("role", "!=", 8)->where("user_id",$request["user"])->orderBy("id")->paginate(100);
            else
                $bonds  = Bond::where("company_id", $this->company_id())->where("role", "!=", 6)->where("role", "!=", 8)->orderBy("id")->paginate(100);
        
            $from_him = $bonds->sum("from_him");
            $tack_from_him  = $bonds->sum("tack_from_him");
            $role = $id;
            $users = User::where("company", $this->company_id())->where("role",$role)->select("name","id")->orderBy("id")->get();
            return view('Accounts.accountBonds.bonds', compact('bonds', 'from_him', 'tack_from_him','role','users'));
        }
    
        
    }
}
