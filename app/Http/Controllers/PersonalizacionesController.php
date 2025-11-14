<?php

namespace App\Http\Controllers;

use App\Services\PersonalizacionService;
use App\Http\Requests\PersonalizacionRequest;

class PersonalizacionController extends Controller
{
    protected $service;

    public function __construct(PersonalizacionService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show($id)
    {
        $personalizacion = $this->service->getById($id);

        if (!$personalizacion) {
            return response()->json(['message' => 'Personalización no encontrada'], 404);
        }

        return response()->json($personalizacion);
    }

    public function store(PersonalizacionRequest $request)
    {
        $personalizacion = $this->service->create($request->validated());
        return response()->json($personalizacion, 201);
    }

    public function update(PersonalizacionRequest $request, $id)
    {
        $personalizacion = $this->service->update($id, $request->validated());

        if (!$personalizacion) {
            return response()->json(['message' => 'Personalización no encontrada'], 404);
        }

        return response()->json($personalizacion);
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Personalización no encontrada'], 404);
        }

        return response()->json(['message' => 'Personalización eliminada']);
    }
}
