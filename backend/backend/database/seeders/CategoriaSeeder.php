<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;


class CategoriaSeeder extends Seeder
{
   public function run(): void
    {
        $categorias = ['Matemáticas', 'Física', 'Informática'];

        foreach ($categorias as $cat) {
            Categoria::create(['categoria' => $cat]);
        }
    }
}
