<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Owner Resto',
            'email' => 'owner@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}