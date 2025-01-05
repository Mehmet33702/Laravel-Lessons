<!DOCTYPE html>
<html>

<head>
    <title>Dosya Yükleme</title>
</head>

<body>
    <h2>Dosya Yükle</h2>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="file">Dosya:</label>
        <input type="file" name="excel_file" id="excel_file">
        <br><br>
        <input type="submit" value="Yükle">
    </form>
</body>

</html>
