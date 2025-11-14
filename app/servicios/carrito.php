<?php

namespace App\Services;

use App\Models\TblCarrito;

class CarritoService
{
    // Obtener todos los carritos
    public function getAll()
    {
        return TblCarrito::all();
    }

    // Obtener carrito por ID
    public function getById($id)
    {
        return TblCarrito::find($id);
    }

    // Obtener carritos por usuario
    public function getByUser($id_usuario)
    {
        return TblCarrito::where('id_usuario', $id_usuario)->get();
    }

    // Crear un carrito
    public function create(array $data)
    {
        return TblCarrito::create($data);
    }

    // Actualizar un carrito
    public function update($id, array $data)
    {
        $carrito = TblCarrito::find($id);

        if (!$carrito) {
            return null;
        }

        $carrito->update($data);
        return $carrito;
    }

    // Eliminar un carrito
    public function delete($id)
    {
        $carrito = TblCarrito::find($id);

        if (!$carrito) {
            return null;
        }

        $carrito->delete();
        return true;
    }
}
