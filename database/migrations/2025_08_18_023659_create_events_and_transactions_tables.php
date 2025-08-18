<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi')->nullable();
            $table->dateTime('tanggal_event');
            $table->string('lokasi')->nullable();
            $table->integer('harga_tiket');
            $table->integer('stok_tiket')->default(0);
            $table->string('gambar')->default('default_event.jpg');
            $table->boolean('is_coming_soon')->default(false); // Untuk toggle coming soon
            $table->timestamps(); // otomatis membuat created_at dan updated_at
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('order_id')->unique();
            $table->integer('jumlah_tiket');
            $table->bigInteger('total_harga');
            $table->enum('status_pembayaran', ['pending', 'paid', 'cancel', 'expire'])->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('events');
    }
};