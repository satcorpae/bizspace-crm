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
        Schema::create('ejari_tracksheets', function (Blueprint $table) {
            $table->id();
            $table->date('dater');
            $table->string('customer_agent');
            $table->text('description');
            $table->decimal('selling_price');
            $table->decimal('cost');
            $table->string('sales_ref');
            $table->string('mode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ejari_tracksheets');
    }
};
