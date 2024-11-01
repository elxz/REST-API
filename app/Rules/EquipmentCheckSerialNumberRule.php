<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\EquipmentType;

class EquipmentCheckSerialNumberRule implements ValidationRule
{
  private $equipment_type_id;
  private $mask;

  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct($equipment_type_id)
  {
    $this->equipment_type_id = $equipment_type_id;
  }

  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    $equipment_type = EquipmentType::find($this->equipment_type_id);

    if ($equipment_type === null) {
      $fail('The selected type of equipment is required');
    } else {
      $this->mask = $equipment_type->mask;

      if (!EquipmentType::checkSerialNumberMask($value, $this->mask)) {
        $fail('The serial number does not match the mask of the selected type');
      }
    }
  }
}
