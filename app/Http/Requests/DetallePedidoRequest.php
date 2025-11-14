<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetallePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_pedido' => 'required|exists:tbl_pedidos,id_pedido',
            'id_producto' => 'required|exists:tblProductos,id_producto',
            'id_personalizacion' => 'nullable|exists:tblPersonalizaciones,id_personalizacion',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0'
        ];
    }
}
