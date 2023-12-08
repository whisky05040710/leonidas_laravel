<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  use HasFactory;

  protected $fillable = [
    "stockName",
    "unit",
    "reorderPoint",
    "inventory_category_id"
  ];

  public function inventoryCategory()
  {
    return $this->belongsTo(InventoryCategory::class, 'inventory_category_id');
  }
}
