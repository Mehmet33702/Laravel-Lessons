<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">    
    <title>Yükleme Sayfası</title>
  </head>
  <body>  
    <div>
        <!-- enctype="multipart/form-data" eklentisi mutlaka dosya işlemlerinde yapılmalı -->
   <form action="{{ route('yukle') }}" method="post" enctype="multipart/form-data">
    @csrf
        <label>Resim Seçiniz :</label><br>
        <input type="file" name="resim"><br>
        <input type="submit" name="ilet" value="Resim Yükle">
    </form>


    </div>
  </body>
</html>