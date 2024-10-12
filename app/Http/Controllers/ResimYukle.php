<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResimYukle extends Controller
{
    public function resimyukle(Request $request){
        //echo $request->resim->getClientOriginalName(); //dosyanın ismini görme yöntemleri
        //echo $request->resim->getClientOriginalExtension();
        //$ilkadi=$request->resim->getClientOriginalName(); //resmin ilk adını alma

        $resimad=rand(0,1000).".".$request->resim->getClientOriginalExtension();
        $yukle=$request->resim->move(public_path('imageyukle'),$resimad); //dosya yükleme izin için public_path kullanılır
        echo $request->resim->getClientOriginalName()." ismindeki resim dosyası ".$resimad." isminde yüklenmiştir.";
    }
    //Yüklenecek resimleri herkesin erişime açık olması isteniyorsa public klasörüne yüklenir
    //yüklenecek resimleri sadece adminlerin erişime açık olması isteniyorsa storage/app klasörüne yüklenir
}

