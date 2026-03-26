<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nivel;

class NivelSeeder extends Seeder
{
    public function run(): void
    {
        $niveles = [
            'Primaria',
            'Secundaria',
            'Preparatoria',
            'TSU',
            'Universidad',
            'Maestría',
            'Doctorado'
        ];

        foreach ($niveles as $nivel) {
            Nivel::create(['nivel' => $nivel]);
        }
    }
}
