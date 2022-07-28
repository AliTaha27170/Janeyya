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

    /**
     * Get the user that owns the Bond
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    

}
