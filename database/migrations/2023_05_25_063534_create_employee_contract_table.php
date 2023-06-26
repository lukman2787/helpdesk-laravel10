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
        Schema::create('employee_contract', function (Blueprint $table) {
            $table->id('contract_id');
            $table->bigInteger('employee_id');
            $table->bigInteger('contract_type_id');
            $table->date('from_date');
            $table->bigInteger('designation_id');
            $table->string('title', 150);
            $table->date('to_date')->nullable();
            $table->mediumText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_contract');
    }
};
