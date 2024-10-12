<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FormKontrol
{
    /** 
     * Gelen bir isteği işleyin.
     * Form ile gelen istekleri sorun yoksa Closure ile aktarıyor
     * Bu yapının kolay kullanımı için Kernel.php dosyasına tanımla yapılır
     * Kernel.php tanımlaması:
     * 'arakontrol'=>\App\Http\Middleware\FormKontrol::class,
     * 
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->metin=="geri")
        {
            return redirect('form'); //eğer metin içinde elma var ise redirect ile gerei form sayfasına gönderiyor
        }
        return $next($request);
    }
}
