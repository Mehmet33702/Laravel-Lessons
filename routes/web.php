<?php

use Illuminate\Support\Facades\Route;
//buradan controller in tanımlanması gerekir
use App\Http\Controllers\Uygulama;
use App\Http\Controllers\Ornek;
use App\Http\Controllers\Yonet;

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

Route::get('/web', [Yonet::class, 'site']);