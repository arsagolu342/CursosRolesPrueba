<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Ages;
class ComplentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::create([
        //     'name' => 'Musica',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Tecnología',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Salud',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Deportes',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Educación',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Entretenimiento',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Ciencia',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Arte',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Viajes',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Negocios',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Viajes',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Negocios',
        //     'type' => 0
        // ]);
        // Category::create([
        //     'name' => 'Viajes',
        //     'type' => 0
        // ]);

        // Category::create([
        //     'name' => 'Negocios',
        //     'type' => 1
        // ]);
        // Category::create([
        //     'name' => 'Viajes',
        //     'type' => 1
        // ]);

        // Category::create([
        //     'name' => 'Otros',
        //     'type' => 1
        // ]);
        // Ages::create([
        //     'range' => '5-8',
        //     'description' => 'Contenido educativo'
        // ]);
        // Ages::create([
        //     'range' => '9-13',
        //     'description' => 'Con supervisión'
        // ]);
        // Ages::create([
        //     'range' => '14-16',
        //     'description' => 'Con supervisión'
        // ]);
        // Ages::create([
        //     'range' => '16+',
        //     'description' => 'Apto para todos'
        // ]);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
    }
}