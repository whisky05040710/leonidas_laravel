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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->enum('discount_type', ['None','PWD', 'Senior Citizen']);
            $table->integer('discount_amount');
            $table->integer('totalAfterDiscount');
            $table->integer('serviceCharge');
            $table->integer('vat');
            $table->integer('totalBill');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
