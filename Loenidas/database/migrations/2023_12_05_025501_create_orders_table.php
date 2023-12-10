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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->enum('status', ['Order Cart', 'Order Placed', 'Order Paid', 'Order Cooked', 'Order Served', 'Order Completed'])->default('Order Cart');
            $table->enum('discountType', ['None', 'PWD', 'Senior Citizen'])->nullable();
            $table->integer('totalBill')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');

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
