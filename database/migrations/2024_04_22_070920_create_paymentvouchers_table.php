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
        Schema::create('paymentvouchers', function (Blueprint $table) {
            $table->id();
            
            $table->string('customer_agent');
            $table->string('address');
            $table->string('location');

            //Payment Details
            $table->string('payment_number');
            $table->date('date_t');
            $table->string('terms');

            //table
            $table->string('description');
            $table->string('quantity');
            $table->string('rate');
            $table->string('trn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentvouchers');
    }
};
