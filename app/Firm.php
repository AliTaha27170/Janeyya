<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
