<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetalleCarrito;
use App\Models\Usuarios;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'tbl_carrito';
    protected $primaryKey = 'id_carrito';

    protected $fillable = [
        'id_usuario',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleCarrito::class, 'id_carrito', 'id_carrito');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}