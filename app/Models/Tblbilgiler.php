<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//tablo isminin verilmesi kolaylık sağlar, önemli olan veritabanında çalışılacak tablonun tanımlanması
class Tblbilgiler extends Model
{
    use HasFactory;
    //table olarak tanımlanır, ilişkilendirme yapılır
    protected $table="tblbilgiler"; 
    //fillable tanımlanır
    protected $fillable = ['ad','metin','created_at','updated_at']; //tanımlama yapılmaz ise id dışındakiler hata verir.

}
