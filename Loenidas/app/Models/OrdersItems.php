<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'total_price',
        'menu_id',
        'order_id'

    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }
}
