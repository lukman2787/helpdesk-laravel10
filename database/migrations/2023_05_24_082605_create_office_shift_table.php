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
        Schema::create('office_shift', function (Blueprint $table) {
            $table->id('office_shift_id');
            $table->bigInteger('company_id');
            $table->string('shift_name', 100);
            $table->integer('working_days');
            $table->time('first_in_time')->nullable();
            $table->time('first_out_time')->nullable();
            $table->time('second_in_time')->nullable();
            $table->time('second_out_time')->nullable();
            $table->time('third_in_time')->nullable();
            $table->time('third_out_time')->nullable();
            $table->time('fourth_in_time')->nullable();
            $table->time('fourth_out_time')->nullable();
            $table->time('fifth_in_time')->nullable();
            $table->time('fifth_out_time')->nullable();
            $table->time('sixth_in_time')->nullable();
            $table->time('sixth_out_time')->nullable();
            $table->time('seventh_in_time')->nullable();
            $table->time('seventh_out_time')->nullable();
            $table->time('eighth_in_time')->nullable();
            $table->time('eighth_out_time')->nullable();
            $table->time('ninth_in_time')->nullable();
            $table->time('ninth_out_time')->nullable();
            $table->time('tenth_in_time')->nullable();
            $table->time('tenth_out_time')->nullable();
            $table->time('eleventh_in_time')->nullable();
            $table->time('eleventh_out_time')->nullable();
            $table->time('twelfth_in_time')->nullable();
            $table->time('twelfth_out_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_shift');
    }
};
