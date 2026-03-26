<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index()
    {
        return Tema::with(['materias.nivel', 'materias.categoria'])->get();
    }

    public function store(Request $request)
    {
        try {
    
            $data = $request->validate([
                'tema' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'materia_id' => 'required|exists:materias,PK_Materia'
            ]);
    
            $tema = Tema::create([
                'tema' => $data['tema'],
                'descripcion' => $data['descripcion']
            ]);
    
            DB::table('tema_materia')->insert([
                'FK_Tema' => $tema->PK_Tema,
                'FK_Materia' => $data['materia_id']
            ]);
    
            return response()->json([
                'ok' => true,
                'tema' => $tema
            ]);
    
        } catch (\Exception $e) {
    
            return response()->json([
                'ok' => false,
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ],500);
    
        }
    }



}
