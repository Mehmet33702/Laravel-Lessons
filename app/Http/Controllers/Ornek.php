<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ornek extends Controller
{
   function test($isim)
   {
    return "Merhaba ".$isim;
   }
   function adsoyad($isim)
   {
    return view('ornekview',['ad'=>$isim]);
   }
}
