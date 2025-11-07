<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;

    protected $table = 'tbl_detalle_pedido';
    protected $primaryKey = 'id_detalle_pedido';

    protected $fillable = [
        'id_pedido',
        'id_producto',
        'id_personalizacion',
        'cantidad',
        'precio_unitario',
        'subtotal'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id_pedido');
    }
}
