<?php

namespace App\Http\Requests;

use App\Rules\EquipmentCheckSerialNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
        'equipment_type_id' => ['required', 'integer'],
        'description' => ['required'],
        'serial_number' => ['required', new EquipmentCheckSerialNumberRule(equipment_type_id: $this->input('equipment_type_id'))],
    ];
  }
}
