<?php

namespace App\Services;

use App\Models\TblPersonalizaciones;

class PersonalizacionService
{
    public function getAll()
    {
        return TblPersonalizaciones::all();
    }

    public function getById($id)
    {
        return TblPersonalizaciones::find($id);
    }

    public function create(array $data)
    {
        return TblPersonalizaciones::create($data);
    }

    public function update($id, array $data)
    {
        $personalizacion = TblPersonalizaciones::find($id);

        if (!$personalizacion) {
            return null;
        }

        $personalizacion->update($data);
        return $personalizacion;
    }

    public function delete($id)
    {
        $personalizacion = TblPersonalizaciones::find($id);

        if (!$personalizacion) {
            return null;
        }

        $personalizacion->delete();
        return true;
    }
}
