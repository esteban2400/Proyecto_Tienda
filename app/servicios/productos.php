<?php
namespace App\Services;

use App\Models\TblProductos;

class ProductoService
{
    public function getAll()
    {
        return TblProductos::with('categoria')->get();
    }

    public function getById($id)
    {
        return TblProductos::with('categoria')->find($id);
    }

    public function create(array $data)
    {
        return TblProductos::create($data);
    }

    public function update($id, array $data)
    {
        $producto = TblProductos::find($id);
        if (!$producto) return null;
        $producto->update($data);
        return $producto;
    }

    public function delete($id)
    {
        $producto = TblProductos::find($id);
        if (!$producto) return null;
        $producto->delete();
        return true;
    }
}
