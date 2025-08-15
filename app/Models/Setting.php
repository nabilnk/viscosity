<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        if (! $setting) {
            return $default;
        }

        // kalau isinya 0/1, balikin dalam bentuk boolean
        if ($setting->value === '0' || $setting->value === 0) {
            return false;
        }
        if ($setting->value === '1' || $setting->value === 1) {
            return true;
        }

        return $setting->value;
    }



    public static function set(string $key, $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}