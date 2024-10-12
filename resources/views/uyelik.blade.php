<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <title>Üye Kayıt -Kontrol</title>
  </head>
  <body>

<!--validation dan dönen hataları göstermek, errors otomatik tanımlı burada içinde değer varmı kontrol ediliyor-->
    @if($errors->any())
    <ul>
        @foreach ($errors->all() as $hatalar)
            <li>{{ $hatalar }}</li>
        @endforeach
    </ul>
    @endif

    <div>
    <form action="{{ route('uyekayit') }}" method="POST"> <!--route('sonuc') sayfasına gitmesi-->
        <!-- csrf Token yapısı oluşturuyor Laravelde güvenlik token işlemleri için zorunlu-->
        @csrf

        <label>Ad Soyad :</label><br>
        <input type="text" name="adsoyad"><br>
        <label>Telefon :</label><br>
        <input type="text" name="telefon"><br>
        <label>e-Posta :</label><br>
        <input type="text" name="email"><br><br>
        <input type="submit" name="ilet" value="Gönder">


    </form>
    </div>
  </body>
</html>
