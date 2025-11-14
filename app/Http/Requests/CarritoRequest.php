<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarritoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $carritoId = $this->route('id'); // Para actualizar si es necesario

        return [
            'id_usuario' => 'required|exists:tblUsuarios,id_usu
