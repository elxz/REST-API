<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\EquipmentTypeResource;

class EquipmentResource extends JsonResource
{
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'equipment_type' => new EquipmentTypeResource($this->whenLoaded('equipment_type')),
      'serial_number' => $this->serial_number,
      'description' => $this->description,
    ];
  }
}
