<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function sales()
    {
        return $this->hasMany(Sale::class,'customer_id')->where('active', 1);
    }


    public function fingerprints()
    {
        return $this->hasMany(Fingerprint::class,'fingerprint_id');
    }

}