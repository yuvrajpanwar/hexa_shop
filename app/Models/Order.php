<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'customer_id',
        'name',
        'email',
        'phone',
        'address',
        'total_amount',
        'payment_method',
        'payment_status',
        'special_notes',
        'phone'
    ];

    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
