<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $primaryKey = 'checkout_id';
    protected $fillable = [
        'user_id', 'product_id', 'category_id', 'payment_method', 
        'no_meja', 'nama', 'no_telpon', 'bukti_bayar', 'status', 'total_amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'checkout_id', 'checkout_id');
    }
public function products()
{
    return $this->belongsToMany(Product::class, 'checkouts', 'checkout_id', 'product_id');
}

    public function getProductsAttribute()
    {
        $productIds = explode(',', $this->product_id);
        return Product::whereIn('product_id', $productIds)->get();
    }
}
