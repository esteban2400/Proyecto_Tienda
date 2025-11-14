<?php
namespace App\Http\Controllers;

use App\Services\DetallePedidoService;
use App\Http\Requests\DetallePedidoRequest;

class DetallePedidoController extends Controller
{
    protected $service;

    public function __construct(DetallePedidoService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show($id)
    {
        $detalle = $this->service->getById($id);
        if (!$detalle) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($detalle);
    }

    public function store(DetallePedidoRequest $request)
    {
        return response()->json($this->service->create($request->validated()), 201);
    }

    public function update(DetallePedidoRequest $request, $id)
    {
        $detalle = $this->service->update($id, $request->validated());
        if (!$detalle) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json($detalle);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) return response()->json(['message' => 'No encontrado'], 404);
        return response()->json(['message' => 'Eliminado']);
    }
}
