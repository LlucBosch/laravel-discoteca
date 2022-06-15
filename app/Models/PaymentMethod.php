<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = [];
    protected $table = 'payment_methods';

    public function sales()
    {
        return $this->hasMany(Sale::class,'payment_method_id')->where('active', 1);
    }

}