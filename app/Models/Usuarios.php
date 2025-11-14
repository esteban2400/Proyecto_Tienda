<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Models\Personalizaciones;
use App\Models\Carrito;


class Usuarios extends Model
{
    //
    use HasFactory;

    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol', 
        'fecha_registro'
    ];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'id_usuario', 'id_usuario');
    }

    public function personalizaciones()
    {
        return $this->hasMany(Personalizaciones::class, 'id_usuario', 'id_usuario');
    }

    public function carrito()
    {
        return $this->hasOne(Carrito::class, 'id_usuario', 'id_usuario');
    }
}