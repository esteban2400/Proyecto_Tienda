<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carrito;
use App\Models\Usuarios;

class DetalleCarrito extends Model
{
    use HasFactory;

    protected $table = 'tbl_detalle_carrito';
    protected $primaryKey = 'id_detalle';

    protected $fillable = [
        'id_carrito',
        'id_producto',
        'cantidad',
        'precio_unitario',
        'Subtotal'
    ];

    public function detalles()
    {
        return $this->hasMany(Carrito::class, 'id_carrito', 'id_carrito');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}