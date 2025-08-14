<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VVIPSetting extends Model
{
    protected $fillable = [
        'is_active',
        'rules',
        'benefits',
        'achievements',
    ];
}
