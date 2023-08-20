<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// ------------- Importar la clase Storage
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ------------- Comprobar si el directorio posts en el path: storage/app/public existe
        if(Storage::disk('public')->exists('posts')) {
            // ------------- Eliminar el directorio para luego crearlo
            Storage::disk('public')->deleteDirectory('posts');
        }

        // ------------- Crear el directorio posts en el path: storage/app/public
        Storage::disk('public')->makeDirectory('posts');

        \App\Models\Post::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
