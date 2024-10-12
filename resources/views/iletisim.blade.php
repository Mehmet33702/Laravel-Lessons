<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <title>Form Sayfası</title>
  </head>
  <body>  <div>
    <form action="{{ route('iletisim-sonuc') }}" method="POST"> <!--route('sonuc') sayfasına gitmesi-->
        <!-- csrf Token yapısı oluşturuyor Laravelde güvenlik token işlemleri için zorunlu-->
        @csrf

        <label>Ad soyad :</label>
        <input type="text" name="adsoyad"><br>
        <label>e-Posta :</label>
        <input type="text" name="email"><br>
        <label>Telefon :</label>
        <input type="text" name="telefon"><br>
        <label>Mesaj :</label><br>
        <textarea name="metin" style="width:300px; height:200px" id="metin"> </textarea><br><br>
        <input type="submit" name="ilet" value="Gönder">


    </form>
    </div>
  </body>
</html>
