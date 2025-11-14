<?php
namespace App\Http\Controllers;

use App\Services\ProductoService;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    protected $service;

    public function __construct(ProductoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show($id)
    {
        $producto = $this->service->getById($id);
        if (!$producto) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($producto);
    }

    public function store(ProductoRequest $request)
    {
        return response()->json($this->service->create($request->validated()), 201);
    }

    public function update(ProductoRequest $request, $id)
    {
        $producto = $this->service->update($id, $request->validated());
        if (!$producto) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($producto);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json(['message' => 'Eliminado']);
    }
}
