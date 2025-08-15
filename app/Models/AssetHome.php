<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetHome extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', // track_record, documentation, our_team
        'image',
        'name',
        'documentation',
        'position' // untuk team (jabatan)
    ];
}
