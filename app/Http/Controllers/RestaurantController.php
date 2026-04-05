<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    public function create()
    {
        return view('restaurant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user = User::first(); 

        $restaurant = Restaurant::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name) . '-' . substr(uniqid(), -4), 
            'description' => $request->description,
        ]);

        return redirect()->route('restaurant.show', $restaurant->slug);
    }

    public function show($slug)
    {
        $restaurant = Restaurant::with(['menus' => function($query) {
            $query->where('is_available', true);
        }])->where('slug', $slug)->firstOrFail();

        return view('restaurant.show', compact('restaurant'));
    }
}