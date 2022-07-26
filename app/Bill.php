<?php

namespace App;

use App\helpers\bills;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function get_dealer()
    {
        return $this->belongsTo(User::class,'dealer_id');
    }

    public function get_who_write()
    {  
        return $this->belongsTo(User::class,'who_write');
    }

    public function get_farmer()
    {
        return $this->belongsTo(User::class,'farmer_id');
    }

    public function get_dalal()
    {
        return $this->belongsTo(User::class,'dalal_id');
    }
    public function bills()
    {
        return $this->hasMany(Bill::class,'bill_id' , 'id');
    }
    
    public function Date_Bill()
    {
        return $this->hasMany(Date_Bill::class,'bill_id' , 'id');
    }
    
    //جعل الإشعار مقروء
    public function read($id)
    {
       Bill::find($id)->update(['notfic'=>0]);
       return '';
    }
    
}
