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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('stockName');
            $table->integer('quantity')->default(0);
            $table->string('unit');
            $table->integer('reorderPoint');
            $table->enum('status', ['Cart', 'Inventory'])->default('Inventory');
            $table->timestamps();

            $table->unsignedBigInteger('inventory_category_id');
            $table->foreign('inventory_category_id')->references('id')->on('inventory_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
