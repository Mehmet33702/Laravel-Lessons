<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">    
    <title>Form Sayfası</title>
  </head>
  <body>
    <form action="{{ route('sonuc') }}" method="POST"> <!--route('sonuc') sayfasına gitmesi-->
        <!-- csrf Token yapısı oluşturuyor Laravelde bu zorunlu-->
        @csrf 
        
        <label for="fname">Ad soyad :</label>
        <input type="text" name="isim" value="Mehmet"><br>
        <label for="lname">Mesaj :</label><br>
        <textarea name="metin" style="width:300px; height:200px" id="metin">Merhaba</textarea><br><br>
        <input type="submit" name="ilet" value="Gönder">


    </form>
    
  </body>
</html>