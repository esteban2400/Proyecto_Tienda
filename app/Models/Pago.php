    <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'tbl_pagos';
    protected $primaryKey = 'id_pago';

    protected $fillable = [
        'id_pedido',
        'fecha_pago',
        'metodo',
        'monto',
        'estado',
        'referencia_transaccion'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id_pedido');
    }
}
