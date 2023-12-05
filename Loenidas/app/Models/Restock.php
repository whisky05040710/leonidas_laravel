<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;

    protected $fillable = [
        "stockName",
        "quantity",
        "unit",
        "unitCost",
        "reorderPoint",
        "inventory_category_id"
      ];
    
      public function inventoryCategory()
      {
        return $this->belongsTo(InventoryCategory::class, 'inventory_category_id');
      }
}