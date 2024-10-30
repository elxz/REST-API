<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EquipmentType;

class Equipment extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $guarded = ['id', 'created_at', 'deleted_at'];
  protected $table = 'equipments';

  public function equipment_type()
  {
    return $this->belongsTo(EquipmentType::class);
  }
}
