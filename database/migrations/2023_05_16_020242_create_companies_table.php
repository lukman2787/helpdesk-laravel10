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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('company_id');
            $table->bigInteger('type_id')->default('1');
            $table->string('company_name', 100);
            $table->string('trading_name', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('registration_no', 100)->nullable();
            $table->string('government_tax', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('logo', 100)->nullable();
            $table->string('contact_number', 50)->nullable();
            $table->string('website_url')->nullable();
            $table->mediumText('address_1')->nullable();
            $table->mediumText('address_2')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('country', 50)->nullable();
            $table->integer('is_active')->nullable();
            $table->string('default_currency', 100)->nullable();
            $table->string('default_timezone', 100)->nullable();
            $table->bigInteger('added_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
