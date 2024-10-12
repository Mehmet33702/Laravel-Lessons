<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //veri tabanı bağlantıları için dahil edilmesi gerekir

// burada yapılan işlemleri model oluşturarak yapılabilir. teercih edilen model
class Veritabani_islemi extends Controller
{
    public function ekle()
    {
        DB::table("tblbilgiler")->insert([
            "ad" => "Mehmet",
            "metin"=> "İlk Kayıt"
        ]);
    }
    public function guncelle()
    {
        //şart kullanılmaz ise tüm kayıtlar güncellenir
        DB::table("tblbilgiler")->where("id",1)->update([
            "ad" => "Hüseyin",
            "metin"=> "Günceleme Kayıt"
        ]);
    }

    public function sil()
    {
        //şart kullanılmaz ise tüm kayıtlar silinir
        DB::table("tblbilgiler")->where("id",1)->delete();
    }

    public function tekliste()
    { 
        //şarta bağlı olarak bilgileri getirmek
        $veriler=DB::table("tblbilgiler")->where("id",2)->first(); //first ile sadece bir veriyi getirmek
        echo $veriler->id." ".$veriler->ad." ".$veriler->metin."<br>";
    }
    
    public function tumliste()
    {
        //şart olmadan tüm verileri getirmek
        $veriler=DB::table("tblbilgiler")->get();      
        //print_r($veriler);

        //foreach kullanılarak sadece içerdeki değerler getiriliyor.
        foreach ($veriler as $key => $bilgi){
            echo "<br>".$bilgi->id." ".$bilgi->ad."-".$bilgi->metin."<br>";
        }
    }
}
