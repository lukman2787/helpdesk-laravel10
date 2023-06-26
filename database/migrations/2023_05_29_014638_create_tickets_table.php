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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->bigInteger('location_id')->default('1');
            $table->bigInteger('requester_id');
            $table->string('title', 100);
            $table->mediumText('description');
            $table->string('attach_file', 100)->nullable();
            $table->enum('status', ['O', 'P', 'R', 'C'])->default('O');
            $table->enum('priority', ['low', 'medium', 'high', 'urgent'])->default('low');
            $table->bigInteger('category_id');
            $table->bigInteger('assigned_to')->nullable();
            $table->dateTime('last_reply')->nullable();
            $table->dateTime('closed_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_tickets');
    }
};
