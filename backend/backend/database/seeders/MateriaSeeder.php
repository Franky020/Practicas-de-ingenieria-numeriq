<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materia;


class MateriaSeeder extends Seeder
{
    public function run(): void
    {
        Materia::create([
            'materia' => 'Álgebra',
            'descripcion' => 'Fundamentos matemáticos',
            'FK_Nivel' => 4,       // TSU
            'FK_Categoria' => 1   // Matemáticas
        ]);

        Materia::create([
            'materia' => 'Programación',
            'descripcion' => 'Introducción a la programación',
            'FK_Nivel' => 4,
            'FK_Categoria' => 3   // Informática
        ]);
    }
}
