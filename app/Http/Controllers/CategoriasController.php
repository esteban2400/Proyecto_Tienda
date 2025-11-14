<?php
namespace App\Http\Controllers;

use App\Services\CategoriaService;
use App\Http\Requests\CategoriaRequest;

class CategoriaController extends Controller
{
    protected $service;

    public function __construct(CategoriaService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show($id)
    {
        $categoria = $this->service->getById($id);
        if (!$categoria) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($categoria);
    }

    public function store(CategoriaRequest $request)
    {
        return response()->json($this->service->create($request->validated()), 201);
    }

    public function update(CategoriaRequest $request, $id)
    {
        $categoria = $this->service->update($id, $request->validated());
        if (!$categoria) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json(['message' => 'Eliminado']);
    }
}
