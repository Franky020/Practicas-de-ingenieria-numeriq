<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nivel;


class NivelController extends Controller
{
    public function index()
    {
        return Nivel::all();
    }

    public function store(Request $request)
    {
        return Nivel::create($request->validate([
            'nombre' => 'required|string|max:255'
        ]));
    }
}

