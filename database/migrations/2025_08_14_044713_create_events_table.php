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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->dateTime('date');
            $table->string('flyer_image')->nullable(); // Path ke gambar flyer
            $table->enum('type', ['monthly', 'exclusive'])->default('monthly');
            $table->boolean('is_published')->default(true); // Untuk fitur COMING SOON
            $table->decimal('ticket_price', 12, 2)->nullable();
            $table->integer('ticket_quota')->nullable();
            $table->integer('tickets_sold')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};