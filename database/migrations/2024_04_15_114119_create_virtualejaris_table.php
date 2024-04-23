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
        Schema::create('virtualejaris', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('ejari_unit_no')->default('')->nullable();
            $table->string('contract_no')->default('')->nullable();
            $table->string('area')->default('')->nullable();
            $table->string('validity')->default('')->nullable();
            $table->string('terms')->default('')->nullable();
            $table->string('ref')->default('')->nullable();
            $table->string('agent')->default('')->nullable();
            $table->string('status')->default('')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtualejaris');
    }
};
