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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('quantity');
            $table->string('payment_number')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_province');
            $table->string('receiver_city');
            $table->string('receiver_address');
            $table->string('receiver_zip_code');
            $table->integer('subtotal');
            $table->integer('shipping');
            $table->integer('total_amount');
            $table->string('shipping_receipt')->nullable();
            $table->string('shipping_method');
            $table->string('status');
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
