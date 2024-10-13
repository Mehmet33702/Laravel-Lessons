@extends('home') <!--home.blade-->
@section('title') Anasayfa - PHP Türkiye @endsection
@section('govde') <!-- yenilenecek alanı belirliyoruz buşekilde yapıldığı zaman yeri belirlenmiş oluyor-->
<!-- Masthead-->
        <header class="masthead">
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">$yazi1}}</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-10 align-self-baseline">
                        <p class="text-white-20 font-weight-light mb-5">$yazi2}}</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Devam Et</a>
                    </div>
                </div>
            </div>
        </header>
@endsection <!--section sonlandırılıyor-->
