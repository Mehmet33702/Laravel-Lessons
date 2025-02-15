<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{

     // Navbar için menüleri listeleme
     public function menugoster()
     {
         $menuler = Menu::with('altMenuler')->whereNull('parent_id')->get();
         return view('menugoster', compact('menuler'));
     }

    public function index()
    {
        $menuler = Menu::with('altMenuler')->whereNull('parent_id')->get();
        return view('menuler', compact('menuler'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        $menu = Menu::create($validated);
        return redirect()->route('menuler')->with('success', 'Menü başarıyla eklendi.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validated);
        return redirect()->route('menuler')->with('success', 'Menü başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menuler')->with('success', 'Menü başarıyla silindi.');
    }
}