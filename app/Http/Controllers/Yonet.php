<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Yonet extends Controller
{
    public function site()
    {
        //view.home dosyası üzerine veriler göndermek
        //değişkenleri dizi olarak

        $data["yazi1"]; 
        return view('home');
    }
}

