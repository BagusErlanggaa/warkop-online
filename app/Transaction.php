<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'checkout_id', 'transaction_code', 'payment_status', 
        'payment_date', 'payment_method', 'amount_paid'
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class, 'checkout_id', 'checkout_id');
    }
}
