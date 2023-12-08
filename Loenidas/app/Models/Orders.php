<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
        'menu_id',
        'quantity',
        'total_price_per_order',
        'pos_id',   
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
