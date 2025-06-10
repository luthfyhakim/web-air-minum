<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke table users
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // relasi ke table products
            $table->date('order_date');
            $table->string('address');
            $table->string('payment_method');
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2);
            $table->string('payment_proof')->nullable();
            $table->enum('status', ['Selesai', 'Diproses', 'Ditolak'])->default('diproses');
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
