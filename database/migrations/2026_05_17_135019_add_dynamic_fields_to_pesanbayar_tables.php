<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('banner')->nullable()->after('description');
            $table->boolean('is_open')->default(true)->after('banner');
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->string('category')->default('Makanan Utama')->after('price');
        });
    }

    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn(['banner', 'is_open']);
        });

        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};