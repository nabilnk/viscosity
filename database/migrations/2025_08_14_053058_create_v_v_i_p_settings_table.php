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
    public function up() {
        Schema::create('v_v_i_p_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(true);
            $table->text('rules')->nullable();
            $table->text('benefits')->nullable();
            $table->timestamps();
        });
        // Masukkan nilai default
        DB::table('v_v_i_p_settings')->insert(['id' => 1, 'is_active' => true]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_v_i_p_settings');
    }
};