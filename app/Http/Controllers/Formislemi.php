<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Formislemi extends Controller
{
    public function gorunum()
    {
        return view('form');
    }
    public function sonuc(Request $formbilgileri) //formdan gelen bilgileri Request ile alıyoruz
    {    
        return "$formbilgileri->adsoyad $formbilgileri->metin"; //formda tanımlı ad ve metin bilgisi gönder
    }
}
