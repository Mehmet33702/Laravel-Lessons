<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Uyelik extends Controller
{
    public function uyekayit(Request $uyebilgileri){
        $uyebilgileri->validate([
            "adsoyad"=>"required|min:3|max:50",//boş geçilemez, min 3 karakter, max 50 karakter
            "telefon"=> "required|min:10|max:15",
            "email"=>"required|email",
        ]);
        echo "Form bilgileriniz başarılıyla geçti.";
    }
}
