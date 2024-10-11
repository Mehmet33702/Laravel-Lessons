<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Yonet extends Controller
{
    public function site()
    {
        //view.home dosyası üzerine veriler göndermek
        //değişkenleri dizi olarak
        $data["yazi1"]="Laravel Ders Notları"; 
        $data["yazi2"]="Web Sitemize Hoşgeldiniz.";
        $data["yazi3"]="Hizmetlerimiz"; 
        $data["yazi4"]="Web Tasarımve Yazılım Hizmetleri"; 
        $data["yazi5"]="Bize Ulaşın";  
            return view('home',$data); //home.blade dizi değişken olan $data gönderiliyor        
    }
}

