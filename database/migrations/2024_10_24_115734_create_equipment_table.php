<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('equipments', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('equipment_type_id');
      $table->string('serial_number');
      $table->text('description');
      $table->timestamps();

      $table->softDeletes();

      $table->index('equipment_type_id', 'equipment_type_idx');

      $table
        ->foreign('equipment_type_id', 'equipment_type_fk')
        ->on('equipment_types')
        ->references('id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('equipment');
  }
};
