<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $primaryKey = 'PK_Materia';

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'FK_Nivel', 'PK_Nivel');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'FK_Categoria', 'PK_Categoria');
    }
}



