<?php

use Illuminate\Support\Facades\Route;
//buradan controller kütüphanesi tanımlamaları
use App\Http\Controllers\Uygulama;
use App\Http\Controllers\Ornek;
use App\Http\Controllers\Yonet;
use App\Http\Controllers\Formislemi;
use App\Http\Middleware\FormKontrol;
use App\Http\Controllers\Veritabani_islemi;
use App\Http\Controllers\Model_islemi;
use App\Http\Controllers\IletisimControl;
use App\Http\Controllers\ResimYukle;

Route::get('/', function () {
    return view('welcome');
    
});

//Controller içn kullanılan örnekleri get ve post
//Route::get('anasayfa','Uygulama@index'); // Uygulama Controllers içerisinde yer alan index metodu ulaşır
Route::get('/anasayfa', [Uygulama::class, 'index']);
Route::redirect('/iletisim', '/otomatik');  //iletisim yazınca otomatik yönlendirmeye yönlendirir
Route::get('/hakkimizda', [Uygulama::class, 'hakkimizda']);

//controller içine değişken göndermek
Route::get('/merhaba/{isim}', [Ornek::class, 'test']);

//controller içerisinde view oluşturma ve değişken göndermek
Route::get('/adsoyad/{isim}', [Ornek::class, 'adsoyad']);

//view için kullanılan örnek
Route::get('/ifkomut', function () {return view('ifelsekomut');});

//route isim verme ->name()
Route::get('/web', [Yonet::class, 'site'])->name('linkweb');

//form işlemi
Route::get("/form",[Formislemi::class,'gorunum']);
//form sonuçları, Veri gönderirken post olarak gönderiyoruz
//Route::post("/form-sonuc",[Formislemi::class,'sonuc'])->Middleware([FormKontrol::class])->name('sonuc'); 4
Route::post("/form-sonuc",[Formislemi::class,'sonuc'])->Middleware('arakontrol')->name('sonuc'); 

//Veritbanına işlemleri
Route::get('/ekle', [Veritabani_islemi::class, 'ekle']);
Route::get('/guncelle', [Veritabani_islemi::class, 'guncelle']);
Route::get('/sil', [Veritabani_islemi::class, 'sil']);
Route::get('/tekliste', [Veritabani_islemi::class, 'tekliste']);
Route::get('/tumliste', [Veritabani_islemi::class, 'tumliste']);

//models içerisinden çağrılması
Route::get('/mliste', [Model_islemi::class, 'mtumliste']);
Route::get('/mekle', [Model_islemi::class, 'mekle']);

//form üzerinden veritabına kayıt
Route::get('/iletisim', [IletisimControl::class, 'iletisim']);
Route::post('/iletisim-sonuc', [IletisimControl::class, 'ekleme'])->name('iletisim-sonuc');

//Upload işlemleri
Route::get('/upload', function(){
    return view('upload');
});
Route::post('/resim-ilet', [ResimYukle::class, 'resimyukle'])->name('yukle');