<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'reservation_id',
        'table_id',
        'status',
        'discountType',
        'totalBill',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservation() // Corrected method name here
    {
        return $this->belongsTo(Reservations::class, 'reservation_id');
    }
    public function table() // Corrected method name here
    {
        return $this->belongsTo(Tables::class, 'table_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrdersItems::class, 'order_id');
    }
    

}
