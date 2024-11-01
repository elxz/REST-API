<?php

namespace App\Http\Controllers;

use App\Http\Resources\EquipmentTypeResource;
use App\Models\EquipmentType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class EquipmentTypeController extends BaseController
{
  function index()
  {
    return $this->equipmentTypeService->index();
  }
}
