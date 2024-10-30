<?php

namespace App\Http\Controllers;

use App\Services\EquipmentService;

class BaseController extends Controller
{
  public $service;

  public function __construct(EquipmentService $service)
  {
    $this->service = $service;
  }
}
