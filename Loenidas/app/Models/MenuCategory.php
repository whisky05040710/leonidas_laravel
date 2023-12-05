<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','image'];
    protected $table = 'menu_category';
  
    public function menus()
    {
      return $this->hasMany(Menu::class, 'menu_category_id');
    }

}
