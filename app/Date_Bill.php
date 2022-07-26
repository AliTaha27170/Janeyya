<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date_Bill extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function date_()
    {  
        return $this->belongsTo(Date::class,'date_id');
    }

}
