<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'event_id', 'order_id', 'jumlah_tiket',
        'total_harga', 'status_pembayaran', 'snap_token'
    ];
    public function event() { return $this->belongsTo(Event::class); }
    public function user() { return $this->belongsTo(User::class); }
}