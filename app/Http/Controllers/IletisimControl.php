<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IletisimModel; // models dosyasının dahil edilmesi

class IletisimControl extends Controller
{
    public function iletisim()
    {
        return view('iletisim');
    }
//$request bir değişken farklı isim verilebilir post ile gelen verileri request ile alabiliyoruz
    public function ekleme(Request $request)
    {
        $adsoyad= $request->adsoyad;
        $email= $request->email;
        $telefon= $request->telefon;
        $metin= $request->metin;
        //IletisimModel dosyası üzerinden tanımlı olarak işlem yapılıyor
        IletisimModel::create([
            "adsoyad"=>$adsoyad,
            "email"=>$email,
            "telefon"=>$telefon,
            "metin"=>$metin,
        ]);

        echo "Sayın ".$adsoyad.", bilgileriniz eklendi. ";
    }

    

}
