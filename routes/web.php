<?php

use App\Http\Controllers\Ornek;
//buradan controller kütüphanesi tanımlamaları
use App\Http\Controllers\Yonet;
use App\Http\Controllers\Uygulama;
use App\Http\Controllers\Formislemi;
use App\Http\Controllers\ResimYukle;
use App\Http\Middleware\FormKontrol;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelControl;
use App\Http\Controllers\ImageControl;
use App\Http\Controllers\Model_islemi;
use App\Http\Controllers\IletisimControl;
use App\Http\Controllers\Veritabani_islemi;
use Intervention\Image\Laravel\Facades\Image; //image invertion tanımlaması


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

//Üyelik
Route::get('/uye', function(){
    return view('uyelik');
});//use App\Http\Controllers\ üste eklemeden buradan çağrılması örneği
Route::post('/uye-kayit',[App\Http\Controllers\Uyelik::class, 'uyekayit'])->name('uyekayit');

//tema bağlantıları
Route::get('/tema',function(){
    return view('sayfalar.anasayfa');
});
Route::get('/galeri',function(){
    return view('sayfalar.galeri');
});
Route::get('/hizmetler',function(){
    return view('sayfalar.hizmet');
});
Route::get('/about',function(){
    return view('sayfalar.kurum');
});
Route::get('/mesaj',function(){
    return view('sayfalar.iletisim');
});

//image invertion kullanımı, route group olarak kullanımı
Route::controller(ImageControl::class)->group(function() {
    Route::get('/resim', 'imgyukle')->name('imgyukle');
    Route::post('/image.store', 'storeimage')->name('image.store');
});

//excel to import data
Route::get('/import_excel', [ExcelControl::class, 'import_excel']);
Route::post('/import_excel', [ExcelControl::class, 'import_excel_post']);