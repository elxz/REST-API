<?php

namespace App\Http\Requests;

use App\Rules\EquipmentCheckSerialNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentUpdateRequest extends FormRequest
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
      'equipment_type_id' => ['required'],
      'serial_number' => [
        'required',
        new EquipmentCheckSerialNumberRule($this->input('equipment_type_id')),
      ],
      'description' => ['required'],
    ];
  }
}
