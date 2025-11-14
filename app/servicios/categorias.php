<?php
namespace App\Services;

use App\Models\TblCategorias;

class CategoriaService
{
    public function getAll()
    {
        return TblCategorias::all();
    }

    public function getById($id)
    {
        return TblCategorias::find($id);
    }

    public function create(array $data)
    {
        return TblCategorias::create($data);
    }

    public function update($id, array $data)
    {
        $categoria = TblCategorias::find($id);
        if (!$categoria) return null;
        $categoria->update($data);
        return $categoria;
    }

    public function delete($id)
    {
        $categoria = TblCategorias::find($id);
        if (!$categoria) return null;
        $categoria->delete();
        return true;
    }
}
