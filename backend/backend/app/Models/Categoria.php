<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'PK_Categoria';
    public $incrementing = true;
    protected $keyType = 'int';
}
