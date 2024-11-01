<?php

namespace App\Services;

use App\Models\Equipment;
use App\Http\Resources\EquipmentResource;

class EquipmentService
{
  function index($request)
  {
    $equipment_type_id = $request->input('equipment_type_id') ?? $request->get('q');
    $serial_number = $request->input('serial_number') ?? $request->get('q');
    $description = $request->input('description') ?? $request->get('q');

    return EquipmentResource::collection(
      Equipment::with(['equipment_type'])
        ->where(function ($query) use ($equipment_type_id, $serial_number, $description) {
          if ($equipment_type_id) {
            $query->where('equipment_type_id', $equipment_type_id);
          }

          if ($serial_number) {
            $query->orWhere('serial_number', 'LIKE', "%$serial_number%");
          }

          if ($description) {
            $query->orWhere('description', 'LIKE', "%$description%");
          }
        })
        ->paginate(perPage: 6)->appends($request->query())
    );
  }
  function store($equipment)
  {
    Equipment::create($equipment);
  }
  function show($id)
  {
    return new EquipmentResource(Equipment::with(['equipment_type'])->find($id));
  }
  function update($equipment, $id)
  {
    Equipment::where('id', $id)->update($equipment);
  }
  function destroy($id)
  {
    Equipment::destroy($id);
  }
}
