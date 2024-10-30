<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentTypeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

// Route::group(['prefix' => 'equipment', 'as' => 'equipment.'], function () {
//   Route::get('/', [EquipmentController::class, 'index'])->name('api.equipments.index');
//   Route::get('/{id}', [EquipmentController::class, 'show'])
//     ->name('api.equipments.show')
//     ->where('id', '[0-9]+');
//   Route::post('/', [EquipmentController::class, 'store'])->name('api.equipments.store');
//   Route::put('/{equipment}', [EquipmentController::class, 'update'])->name('api.equipments.update');
//   Route::delete('/{equipment}', [EquipmentController::class, 'destroy'])->name(
//     'api.equipments.destroy'
//   );
// });

// Route::group(['prefix' => 'equipment-type', 'as' => 'equipment-type.'], function () {
//   Route::get('/', [EquipmentTypeController::class, 'index'])->name('api.equipment-type.index');
// });
