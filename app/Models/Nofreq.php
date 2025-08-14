<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nofreq extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'youtube_link'
    ];
}
