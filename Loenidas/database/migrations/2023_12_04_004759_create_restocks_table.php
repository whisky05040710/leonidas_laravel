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
        Schema::create('restocks', function (Blueprint $table) {
            $table->id();
            $table->string('stockName');
            $table->enum('category', ['meat','fish']);
            $table->integer('quantity')->default(0);
            $table->enum('unit', ['Kilogram', 'Gram', 'Pieces']);
            $table->integer('unitCost');
            $table->integer('reorderPoint');
            $table->enum('status', ['Cart', 'Inventory'])->default('Cart');
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
        Schema::dropIfExists('restocks');
    }
};
