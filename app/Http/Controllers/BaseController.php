<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService;
use App\Services\EquipmentTypeService;

class BaseController extends Controller
{
  public $equipmentService;
  public $equipmentTypeService;

  public function __construct(
    EquipmentService $equipmentService,
    EquipmentTypeService $equipmentTypeService
  ) {
    $this->equipmentService = $equipmentService;
    $this->equipmentTypeService = $equipmentTypeService;
  }
}
