<?php

namespace App;

use App\helpers\bills;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function get_roles(){
        $roles = [];
        foreach ($this->getRoleNames() as $key => $role) {
            $roles[$key] = $role;
        }

        return $roles;
    }

    public function check_role($u_id,$p_id,$type){
       
        $r  =  Roles::where('partId', $p_id)->where("userId",$u_id)->where($type,1)->get();
        return count($r);
    }

    public function firm()
    {
        return $this->hasOne('App\Firm');
    }

    public function farmer()
    {
        return $this->belongsTo('App\User' , 'farmer_id');
    }


    public function mt3aked()
    {
        return $this->hasOne(User::class, 'farmer_id', 'id');
    }

    
}
