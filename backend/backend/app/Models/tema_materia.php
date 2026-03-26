<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemaMateria extends Model
{
    protected $table = 'tema_materia';
    protected $primaryKey = 'PK_TemaMateria';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'FK_Tema',
        'FK_Materia',
        'descripcion'
    ];
}


