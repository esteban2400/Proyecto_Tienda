<?php
namespace App\Services;

use App\Models\TblDetallePedido;

class DetallePedidoService
{
    public function getAll()
    {
        return TblDetallePedido::with(['pedido', 'producto', 'personalizacion'])->get();
    }

    public function getById($id)
    {
        return TblDetallePedido::with(['pedido', 'producto', 'personalizacion'])->find($id);
    }

    public function create(array $data)
    {
        return TblDetallePedido::create($data);
    }

    public function update($id, array $data)
    {
        $detalle = TblDetallePedido::find($id);
        if (!$detalle) return null;
        $detalle->update($data);
        return $detalle;
    }

    public function delete($id)
    {
        $detalle = TblDetallePedido::find($id);
        if (!$detalle) return null;
        $detalle->delete();
        return true;
    }
}
