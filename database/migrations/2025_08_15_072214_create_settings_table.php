<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary(); // Nama setting, e.g., 'exclusive_coming_soon'
            $table->string('value');
            $table->timestamps();
        });

        // Masukkan nilai default saat migrasi dijalankan
        DB::table('settings')->insert([
            'key' => 'exclusive_coming_soon',
            'value' => 'false', // Defaultnya, halaman TIDAK coming soon (aktif)
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};