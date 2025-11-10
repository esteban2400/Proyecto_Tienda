<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Productos;

class Categorias extends Model
{
    //
    use HasFactory;

    protected $table = 'tbl_categorias';
    protected $primaryKey = 'id_categoria';

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'id_categoria', 'id_categoria');
    }
}

