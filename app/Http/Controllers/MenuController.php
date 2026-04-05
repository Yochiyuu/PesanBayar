<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Mengambil semua menu yang tersedia (is_available = true)
        $menus = Menu::where('is_available', true)->get();
        
        return view('menu.index', compact('menus'));
    }
}