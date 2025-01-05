<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ilce extends Model
{
    use HasFactory;

    protected $table = 'ilcebilgi'; // Tablo adı

    protected $fillable = [
        'ilce_adi',
        'il_adi',
        'isim',
        'sayi'
    ];
}