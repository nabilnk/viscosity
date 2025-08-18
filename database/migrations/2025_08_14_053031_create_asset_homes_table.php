<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('asset_homes', function (Blueprint $table) {
            $table->id();
            // Tipe aset: 'track_record', 'documentation', 'team', 'collaboration'
            $table->enum('type', ['track_record', 'documentation', 'team', 'collaboration']);
            $table->string('image'); // Path gambar
            $table->string('name')->nullable(); // Untuk nama anggota tim / nama partner
            $table->string('position')->nullable(); // Untuk jabatan anggota tim (jika type='team')
            $table->string('url')->nullable(); // Untuk link partner (jika type='collaboration')
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
