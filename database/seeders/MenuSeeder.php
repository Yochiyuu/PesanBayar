<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::create([
            'name' => 'Mie Gacoan Level 1',
            'description' => 'Mie pedas gurih dengan tingkat kepedasan level 1, dilengkapi taburan ayam cincang dan pangsit goreng.',
            'price' => 10000,
            'image' => 'mie_gacoan_1.jpg',
            'is_available' => true,
        ]);

        Menu::create([
            'name' => 'Mie Gacoan Level 2',
            'description' => 'Mie pedas gurih dengan tingkat kepedasan level 2, dilengkapi taburan ayam cincang dan pangsit goreng.',
            'price' => 10500,
            'image' => 'mie_gacoan_2.jpg',
            'is_available' => true,
        ]);

        Menu::create([
            'name' => 'Es Setan',
            'description' => 'Minuman segar manis yang cocok untuk meredakan pedas.',
            'price' => 8000,
            'image' => 'es_setan.jpg',
            'is_available' => true,
        ]);
    }
}