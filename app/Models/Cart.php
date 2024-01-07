<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'user_id',
        'user_type'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
