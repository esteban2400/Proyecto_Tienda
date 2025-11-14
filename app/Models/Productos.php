<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorias;
use App\Models\Personalizaciones;
use App\Models\DetallePedido;
use App\Models\DetalleCarrito;

class Productos extends Model
{
    //
    use HasFactory;

    protected $table = 'tbl_productos';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_base',
        'stock',
        'id_categoria'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria', 'id_categoria');
    }

    public function personalizaciones()
    {
        return $this->hasMany(Personalizaciones::class, 'id_producto', 'id_producto');
    }

    public function detallesPedido()
    {
        return $this->hasMany(DetallePedido::class, 'id_producto', 'id_producto');
    }

    public function detallesCarrito()
    {
        return $this->hasMany(DetalleCarrito::class, 'id_producto', 'id_producto');
    }
}

