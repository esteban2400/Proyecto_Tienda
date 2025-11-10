<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;
use App\Models\Usuarios;

class Personalizaciones extends Model
{
    //
    use HasFactory;

    protected $table = 'tbl_personalizaciones';
    protected $primaryKey = 'id_personalizacion';

    protected $fillable = [
        'id_producto',
        'id_usuario',
        'tipo',
        'tamaño',
        'precio_extra',
        'diseño',
        'precio_total_personalizacion'
    ];

    public function producto()
    {
        return $this->belongsTo(Productos::class, 'id_producto', 'id_producto');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id_usuario');
    }
}

