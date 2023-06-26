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
        Schema::create('office_locations', function (Blueprint $table) {
            $table->id('location_id');
            $table->bigInteger('company_id')->nullable();
            $table->bigInteger('location_head')->nullable();
            $table->bigInteger('location_manager')->nullable();
            $table->string('location_name', 100);
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('fax', 100)->nullable();
            $table->mediumText('address_1')->nullable();
            $table->mediumText('address_2')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->bigInteger('added_by')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('office_locations');
    }
};
