<!doctype html>
<html lang="tr">
    <head>
        <title>Laravel 11 image</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
    <body>
            <div class="container py-4">
                <div class="row">
                    <div class="col-xl-6 m-auto"></div>
                    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Yüklenecek Resim Seçiniz</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Yükle</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
    </body>
</html>


