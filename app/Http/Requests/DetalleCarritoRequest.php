<?php

namespace App\Http\Controllers;

use App\Services\DetalleCarritoService;
use App\Http\Requests\DetalleCarritoRequest;
use Illuminate\Http\Request;

class DetalleCarritoController extends Controller
{
    protected $service;

    public function __construct(DetalleCarritoService $service)
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

        if (!$detalle) {
            return response()->json(['message' => 'Detalle no encontrado'], 404);
        }

        return response()->json($detalle);
    }

    public function porCarrito($id_carrito)
    {
        return response()->json($this->service->getByCarrito($id_carrito));
    }

    public function store(DetalleCarritoRequest $request)
    {
        $detalle = $this->service->create($request->validated());
        return response()->json($detalle, 201);
    }

    public function update(DetalleCarritoRequest $request, $id)
    {
        $detalle = $this->service->update($id, $request->validated());

        if (!$detalle) {
            return response()->json(['message' => 'Detalle no encontrado'], 404);
        }

        return response()->json($detalle);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Detalle no encontrado'], 404);
        }

        return response()->json(['message' => 'Detalle eliminado']);
    }
}
