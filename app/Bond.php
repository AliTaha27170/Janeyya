<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bond extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCompany()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

}
