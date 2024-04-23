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
        Schema::create('invoicestores', function (Blueprint $table) {
            $table->id();
            $table->date('dater');
            $table->string('invoice_number');
            $table->string('terms');
            $table->date('due_date');
            $table->string('customer_agent');
            $table->string('address');
            $table->string('location');
            $table->string('description');
            $table->string('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoicestores');
    }
};
