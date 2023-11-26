<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        "menu_categories_id",
        'menuName',
        'price',
        'menuStatus',
        'image'
    ];

    public function menu_categories()
    {
        return $this->belongsTo(MenuCategory::class);
    }
}
