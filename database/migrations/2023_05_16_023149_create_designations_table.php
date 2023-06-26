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
        Schema::create('designations', function (Blueprint $table) {
            $table->id('designation_id');
            $table->bigInteger('top_designation_id')->nullable();
            $table->bigInteger('department_id');
            $table->bigInteger('sub_department_id');
            $table->bigInteger('company_id');
            $table->string('designation_name', 100);
            $table->bigInteger('added_by');
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
