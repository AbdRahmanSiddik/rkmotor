<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kategori::create([
            'kode_kategori' => Str::random(8),
            'nama_kategori' => fake()->word(),
        ]);
        Kategori::create([
            'kode_kategori' => Str::random(8),
            'nama_kategori' => fake()->word(),
        ]);
        Kategori::create([
            'kode_kategori' => Str::random(8),
            'nama_kategori' => fake()->word(),
        ]);
        Kategori::create([
            'kode_kategori' => Str::random(8),
            'nama_kategori' => fake()->word(),
        ]);
    }
}
