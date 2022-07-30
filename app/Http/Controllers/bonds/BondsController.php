<?php

namespace App\Http\Controllers\bonds;

use App\Bond;
use App\Http\Controllers\Controller;
use App\Traits\CompanyTrait;
use App\User;
use Illuminate\Http\Request;

class BondsController extends Controller
{
    use CompanyTrait;
    public function getBonds($id, Request $request){

        if($id == 6 || $id == 8){
            
            if (isset($request["start_at"]) and isset($request["end_at"]))
                $bonds  = Bond::where("company_id", $this->company_id())->where("role", $id)
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
                
                return view('accountBonds.bondsFarmer', compact('bonds', 'from_him', 'tack_from_him','role','users'));
            } else {
                return view('accountBonds.bondsDealer', compact('bonds', 'from_him', 'tack_from_him','role','users'));
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
            return view('accountBonds.bonds', compact('bonds', 'from_him', 'tack_from_him','role','users'));
        }
    
        
    }
}
