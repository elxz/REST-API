<?php

namespace App\Services;

use App\Models\Equipment;
use App\Http\Resources\EquipmentResource;

class EquipmentService
{
  function index($equipment_type_id, $serial_number, $description, $query)
  {
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
        ->paginate(perPage: 5)->appends($query)
    );
  }
  function store($equipment)
  {
    Equipment::firstOrCreate(['equipment_type_id' => $equipment['equipment_type_id'], 'serial_number' => $equipment['serial_number']], $equipment);
  }
  function show($id)
  {
    return new EquipmentResource(Equipment::with(['equipment_type'])->find($id));
  }
  function update($equipment, $id)
  {
    if (Equipment::where('equipment_type_id', $equipment['equipment_type_id'])->where('serial_number', $equipment['serial_number'])->count() === 0) {
        Equipment::where('id', $id)->update($equipment);
    }
  }
  function destroy($id)
  {
    Equipment::destroy($id);
  }
}
