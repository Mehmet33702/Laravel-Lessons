<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblbilgiler; //model dosyasının dahil edilmesi


class Model_islemi extends Controller
{
    public function mtumliste()
    {
        //$bilgi=Tblbilgiler::get();//tüm verilerin getirilmesi
        //$bilgi=Tblbilgiler::where("id",2)->first(); //şarta bağlı
        //$bilgi=Tblbilgiler::whereAd("mehmet")->first(); 
        //$bilgi=Tblbilgiler::find(2); //find kullanımı

        $bilgi=Tblbilgiler::whereId(3)->first(); //şarta bağlı (whereId Id baş harfi büyük) farklı bir kullanım
        echo $bilgi->id." ".$bilgi->ad." ".$bilgi->metin."<br>";

    }
    public function mekle()
    {
        Tblbilgiler::create([
            "ad"=>"ahmet",
            "metin"=>"ilk yeni Kayıt",
        ]);    
    }
}
