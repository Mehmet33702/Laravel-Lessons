<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager; //image invertion tanımlanması
use Intervention\Image\Drivers\Gd\Driver; //image invertion tanımlanması

class ImageControl extends Controller
{
    public function imgyukle(){
        return view('image-upload');
    }

    public function storeimage(Request $request){
       $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);

       //resim için yükleme
       $image = $request->file('image');
       //resim adı
       $imageName = time().'.'.$image->getClientOriginalExtension();
       //resmi yükleme
       $image->move('public/imgyukle', $imageName);

       //resim küçültme

        // create new manager instance with desired driver
        $manager = new ImageManager(new Driver());

        dd($request->image);
    }
}
