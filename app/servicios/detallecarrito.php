<?php

namespace App\Services;

use App\Models\TblDetalleCarrito;

class DetalleCarritoService
{
    public function getAll()
    {
        return TblDetalleCarrito::all();
    }

    public function getById($id)
    {
        return TblDetalleCarrito::find($id);
    }

    public function getByCarrito($id_carrito)
    {
        return TblDetalleCarrito::where('id_carrito', $id_carrito)->get();
    }

    public function create(array $data)
    {
        return TblDetalleCarrito::create($data);
    }

    public function update($id, array $data)
    {
        $detalle = TblDetalleCarrito::find($id);

        if (!$detalle) {
            return null;
        }

        $detalle->update($data);
        return $detalle;
    }

    public function delete($id)
    {
        $detalle = TblDetalleCarrito::find($id);

        if (!$detalle) {
            return null;
        }

        $detalle->delete();
        return true;
    }
}
