<?php

use Illuminate\Support\Facades\Route;
//buradan controller kütüphanesi tanımlamaları
use App\Http\Controllers\Uygulama;
use App\Http\Controllers\Ornek;
use App\Http\Controllers\Yonet;
use App\Http\Controllers\Formislemi;
use App\Http\Middleware\FormKontrol;


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