<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AssetHome extends Model
{
    use HasFactory;
    protected $fillable = [
        'type', 'image', 'name', 'position', 'url'
    ];
}