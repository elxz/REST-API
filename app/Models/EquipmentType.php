<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Equipment;

class EquipmentType extends Model
{
  use HasFactory;
  use SoftDeletes;
  protected $guarded = ['id', 'created_at', 'deleted_at'];
  protected $table = 'equipment_types';

  public function equipments()
  {
    return $this->hasMany(Equipment::class);
  }

  public static function checkSerialNumberMask($serial_number, $mask)
  {
    if (strlen($serial_number) != strlen($mask)) {
      return false;
    }

    $rules = [
      'N' => '[0-9]',
      'A' => '[A-Z]',
      'a' => '[a-z]',
      'X' => '[A-Z0-9]',
      'Z' => '[-|_|@]',
    ];

    $mask_rules = str_split($mask);

    $output_regex = '/^';
    foreach ($mask_rules as $rule) {
      $output_regex .= $rules[$rule];
    }
    $output_regex .= '/';

    return preg_match($output_regex, $serial_number) > 0;
  }
}
