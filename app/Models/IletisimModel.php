<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IletisimModel extends Model
{
    use HasFactory;
    //tanımlanması zorunlu
    protected $table="iletisim";
    protected $fillable=['adsoyad','email','telefon','metin'];
}
