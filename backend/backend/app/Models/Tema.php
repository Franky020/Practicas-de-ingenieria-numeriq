<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table = 'temas';
    protected $primaryKey = 'PK_Tema';

    protected $fillable = ['tema', 'descripcion'];

    public function materias()
    {
        return $this->belongsToMany(
            Materia::class,
            'tema_materia',
            'FK_Tema',
            'FK_Materia'
        );
    }
}

