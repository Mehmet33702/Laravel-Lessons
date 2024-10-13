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
       $image->move(storage_path('public/imgyukle'), $imageName);
        dd($request->image);
    }
}
