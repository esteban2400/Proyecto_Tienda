<?php

namespace App\Http\Controllers;

use App\Models\Personalizacion;
use Illuminate\Http\Request;

class PersonalizacionController extends Controller
{
    public function index()
    {
        $personalizaciones = Personalizacion::all();
        return view('personalizaciones.index', compact('personalizaciones'));
    }

    public function create()
    {
        return view('personalizaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'color' => 'required',
            'tamaño' => 'required',
        ]);

        Personalizacion::create($request->all());
        return redirect()->route('personalizaciones.index')->with('success', 'Personalización creada correctamente');
    }

    public function show(Personalizacion $personalizacion)
    {
        return view('personalizaciones.show', compact('personalizacion'));
    }

    public function edit(Personalizacion $personalizacion)
    {
        return view('personalizaciones.edit', compact('personalizacion'));
    }

    public function update(Request $request, Personalizacion $personalizacion)
    {
        $request->validate([
            'nombre' => 'required',
            'color' => 'required',
            'tamaño' => 'required',
        ]);

        $personalizacion->update($request->all());
        return redirect()->route('personalizaciones.index')->with('success', 'Personalización actualizada correctamente');
    }

    public function destroy(Personalizacion $personalizacion)
    {
        $personalizacion->delete();
        return redirect()->route('personalizaciones.index')->with('success', 'Personalización eliminada correctamente');
    }
}