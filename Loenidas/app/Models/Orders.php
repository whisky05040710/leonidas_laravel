<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'discount_type',
        'discount_amount',
        'totalAfterDiscount',
        'serviceCharge',
        'vat',
        'totalBill',
    ];

}
