<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type', // monthly / exclusive
        'date',
        'location',
        'city',
        'flyer_image',
        'is_published', //tambahkan ini
        'price', // harga tiket
    ];
}