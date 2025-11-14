<?php
namespace App\Http\Controllers;

use App\Services\UsuarioService;
use App\Http\Requests\UsuarioRequest;

class UsuarioController extends Controller
{
    protected $service;

    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show($id)
    {
        $usuario = $this->service->getById($id);
        if (!$usuario) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($usuario);
    }

    public function store(UsuarioRequest $request)
    {
        return response()->json($this->service->create($request->validated()), 201);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $usuario = $this->service->update($id, $request->validated());
        if (!$usuario) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json(['message' => 'Eliminado']);
    }
}
