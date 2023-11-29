<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('inventories', function (Blueprint $table) {
      $table->unsignedBigInteger('inventory_category_id');
      $table->foreign('inventory_category_id')->references('id')->on('inventory_category')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    //
    Schema::table('inventories', function (Blueprint $table) {
      $table->dropConstrainedForeignId('inventory_category_id');
    });
  }
};
