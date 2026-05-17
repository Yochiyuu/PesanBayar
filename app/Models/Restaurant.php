<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    // Tambahkan 'banner' dan 'is_open' di sini agar bisa disimpan ke database
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'banner',
        'is_open',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}