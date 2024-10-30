<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;
use App\Models\EquipmentType;

class EquipmentCheckSerialNumberArrayRule implements ValidationRule
{
  private $equipment_type_ids;
  private $mask;

  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($equipment_type_ids)
  {
    $this->equipment_type_ids = $equipment_type_ids;
  }

  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $key = explode('.', $attribute)[1];
    $equipment_type_id = $this->equipment_type_ids[$key];

    $equipment_type = EquipmentType::find($equipment_type_id);

    if (!$equipment_type) {
      $fail('Non equipment_type');
    }

    $this->mask = $equipment_type->mask;

    if (!EquipmentType::checkSerialNumberMask($value, $this->mask)) {
      $fail('mask incorrect');
    }
  }
}
