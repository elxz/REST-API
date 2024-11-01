<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Http\Requests\EquipmentUpdateRequest;
use App\Http\Resources\EquipmentResource;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class EquipmentController extends BaseController
{
  function index(Request $request)
  {
    $equipments = $this->equipmentService->index($request);

    return Inertia::render('Equipments/Index', ['equipments' => $equipments]);
  }

  function store(EquipmentRequest $request)
  {
    $this->equipmentService->store($request->validated());

    return redirect()->route('api.equipments.index');
  }

  function show($id)
  {
    $equipment = $this->equipmentService->show($id);

    return Inertia::render('Equipments/Show', ['equipment' => $equipment]);
  }

  function update(EquipmentRequest $request, $id)
  {
    $this->equipmentService->update($request->validated(), $id);

    return redirect()->route('api.equipments.index');
  }

  function destroy($id)
  {
    $this->equipmentService->destroy($id);

    return redirect()->route('api.equipments.index');
  }
}
