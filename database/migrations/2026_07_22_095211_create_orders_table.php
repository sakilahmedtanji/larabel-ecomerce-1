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
            $table->string('phone');
            $table->string('ip_adress')->nullable();
            $table->string('user_id')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('name')->nullable();
            $table->string('charge')->nullable();
            $table->string('adress')->nullable();
            $table->string('curier')->nullable();
            $table->string('tracking')->nullable();
            $table->string('consignment_id')->nullable();
            $table->string('status')->default('pending')->comment('pending,confirmed,delivered,cancel,return');
            $table->double('price');

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
