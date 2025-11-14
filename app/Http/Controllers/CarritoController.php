<?php

namespace App\Http\Controllers;

use App\Models\TblCarrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // ➤ Obtener todos los carritos
    public function index()
    {
        return response()->json(TblCarrito::all());
    }

    // ➤ Obtener carrito por ID
    public function show($id)
    {
        $carrito = TblCarrito::find($id);

        if (!$carrito) {
            return response()->json(['message' => 'Carrito no encontrado'], 404);
        }

        return response()->json($carrito);
    }

    // ➤ Obtener carritos por usuario
    public function porUsuario($id_usuario)
    {
        $carritos = TblCarrito::where('id_usuario', $id_usuario)->get();
        return response()->json($carritos);
    }

    // ➤ Crear un nuevo carrito
    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer'
        ]);

        $carrito = TblCarrito::create([
            'id_usuario' => $request->id_usuario,
            'estado' => 'activo'
        ]);

        return response()->json($carrito, 201);
    }

    // ➤ Actualizar carrito
    public function update(Request $request, $id)
    {
        $carrito = TblCarrito::find($id);

        if (!$carrito) {
            return response()->json(['message' => 'Carrito no encontrado'], 404);
        }

        $carrito->update($request->all());

        return response()->json($carrito);
    }

    // ➤ Eliminar carrito
    public function destroy($id)
    {
        $carrito = TblCarrito::find($id);

        if (!$carrito) {
            return response()->json(['message' => 'Carrito no encontrado'], 404);
        }

        $carrito->delete();

        return response()->json(['message' => 'Carrito eliminado']);
    }
}
