<?php

namespace App\Http\Requests;

use App\Rules\EquipmentCheckSerialNumberArrayRule;
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
      'equipments' => ['array'],
      'equipments.*.equipment_type_id' => ['required'],
      'equipments.*.serial_number' => [
        'required',
        new EquipmentCheckSerialNumberArrayRule(equipment_type_ids: $this->input('equipments.*.equipment_type_id')),
      ],
      'equipments.*.description' => ['required'],
    ];
  }

  public function messages(): array
  {
    return [
      'equipments.*.serial_number.mask' => 'test',
    ];
  }
}
