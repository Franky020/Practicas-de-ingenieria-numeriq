<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function index()
    {
        return Materia::all();
    }

    public function store(Request $request)
    {
        return Materia::create($request->validate([
            'nombre' => 'required|string|max:255'
        ]));
    }

    public function filtrar(Request $request)
    {
        return Materia::where('FK_Nivel', $request->nivel)
            ->where('FK_Categoria', $request->categoria)
            ->get();
    }

}
