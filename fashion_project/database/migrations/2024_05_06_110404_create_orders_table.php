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

            $table->integer('user_id')->nullable();

            $table->string('first_name');
            $table->string('last_name');
//            $table->string('company_name')->nullable();
            $table->string('country');
            $table->string('Street_address');
            $table->string('town_city');
            $table->string('email');
            $table->string('phone');
            $table->string('payment_type');

            $table->integer('status');

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
