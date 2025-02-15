<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    protected $fillable = ['name', 'url', 'parent_id', 'siralama'];

    public function altMenuler()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function ebeveynMenu()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }
}