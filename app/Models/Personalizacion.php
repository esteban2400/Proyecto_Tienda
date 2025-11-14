<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblPersonalizaciones extends Model
{
    protected $table = 'tblPersonalizaciones';
    protected $primaryKey = 'id_personalizacion';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'activo'
    ];

    // Relación opcional: detalle del carrito
    public function detallesCarrito()
    {
        return $this->hasMany(TblDetalleCarrito::class, 'id_personalizacion', 'id_personalizacion');
    }
}
