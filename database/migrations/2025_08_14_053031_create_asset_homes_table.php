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
        Schema::create('asset_homes', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['track_record', 'our_team'])->default('track_record');
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('image')->nullable();
            $table->string('documentation')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_homes');
    }
};
