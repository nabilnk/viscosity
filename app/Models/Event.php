<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    protected $fillable = [
        'nama_event', 'deskripsi', 'tanggal_event', 'lokasi',
        'harga_tiket', 'stok_tiket', 'gambar', 'is_coming_soon', 'type'
    ];
}