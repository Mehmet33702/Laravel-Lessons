<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Uygulama extends Controller
{
    public function index(){
        return "anasayfa ulaştık";
    }
    public function hakkimizda(){
        return "hakkimizda ulaştık";
    }
    public function otomatik(){
        return "otomatik yönlendirme";
    }
}
