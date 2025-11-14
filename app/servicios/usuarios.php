<?php
namespace App\Services;

use App\Models\TblUsuarios;
use Illuminate\Support\Facades\Hash;

class UsuarioService
{
    public function getAll()
    {
        return TblUsuarios::all();
    }

    public function getById($id)
    {
        return TblUsuarios::find($id);
    }

    public function create(array $data)
    {
        if(isset($data['contraseña'])) {
            $data['contraseña'] = Hash::make($data['contraseña']);
        }
        return TblUsuarios::create($data);
    }

    public function update($id, array $data)
    {
        $usuario = TblUsuarios::find($id);
        if (!$usuario) return null;

        if(isset($data['contraseña'])) {
            $data['contraseña'] = Hash::make($data['contraseña']);
        } else {
            unset($data['contraseña']);
        }

        $usuario->update($data);
        return $usuario;
    }

    public function delete($id)
    {
        $usuario = TblUsuarios::find($id);
        if (!$usuario) return null;
        $usuario->delete();
        return true;
    }
}
