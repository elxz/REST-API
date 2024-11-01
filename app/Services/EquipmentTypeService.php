<?php

namespace App\Services;

use App\Models\EquipmentType;
use App\Http\Resources\EquipmentTypeResource;

class EquipmentTypeService
{
  function index()
  {
    return EquipmentTypeResource::collection(EquipmentType::all());
  }
}
