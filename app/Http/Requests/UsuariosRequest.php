<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;

    }


    public function rules(): array
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);

        return [
            //
            'nombre' => 'required|string|max:40',
            'email' => ($isUpdate ? 'sometimes' : 'required') . '|string|email|unique:tblUsuarios,email|max:150',
            'password' => ($isUpdate ? 'sometimes' : 'required') . '|string|min:6',
            'rol' => 'required|string|in:admin,cliente',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
        ];
    }
}
