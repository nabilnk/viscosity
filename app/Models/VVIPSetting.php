<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VVIPSetting extends Model
{
    use HasFactory;
       protected $table = 'v_v_i_p_settings';
       
        protected $fillable = [
        'is_active',
        'rules',
        'benefits',
        'achievements',
    ];
}