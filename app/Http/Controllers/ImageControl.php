<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager; //image invertion tanımlanması
use Intervention\Image\Drivers\Gd\Driver; //GD tanımlama image invertion tanımlanması

class ImageControl extends Controller
{
    public function imgyukle(){
        return view('image-upload');
    }

    public function storeimage(Request $request){
        $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       //resim için yükleme
        $image = $request->file('image');
       //resim adı
        $imageName = time().'.'.$image->getClientOriginalExtension();
       //resmi yükleme
        $image->move('public/imgyukle', $imageName);

       //resim işlemleri
       //-------------------------------------------------------
        //istenilen sürücü ile yeni yönetici örneği oluştur
        $imgManager = new ImageManager(new Driver());

        // Yerel dosya sisteminden yüklenen imaj okunuyor (yüklemeler)
        $thumblmage =$imgManager->read('public/imgyukle/'.$imageName);

        // Resmi yeniden boyutlandır, cover
        $thumblmage->resize(300, 200);
        //$thumblmage->cover(300, 200);

       // Yeniden boyutlandırılan resmi farklı bir dizinde saklayın
        $response= $thumblmage->save(public_path('public/imgyukle/thumbnails/'.$imageName));

       // Resmi veritabanında saklayabiliriz
        if($response){
        return back()->with('success', $imageName.' Resim, yüklendi ve boyutlandırıldı.');
        }
        return back()->with('error','Resim yüklenemedi ve yeniden boyutlandırılamadı.');


    }
}
