<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EquipmentTypeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });
Route::get('/', function () {
  return redirect()->route('api.equipments.index');
});

Route::get('/api/equipments', [EquipmentController::class, 'index'])->name('api.equipments.index');
Route::get('/api/equipments/{id}', [EquipmentController::class, 'show'])
  ->name('api.equipments.show')
  ->where('id', '[0-9]+');
Route::post('/api/equipments', [EquipmentController::class, 'store'])->name('api.equipments.store');
Route::put('/api/equipments/{id}', [EquipmentController::class, 'update'])->name(
  'api.equipments.update'
);
Route::delete('/api/equipments/{id}', [EquipmentController::class, 'destroy'])->name(
  'api.equipments.destroy'
);

Route::get('/api/equipment-type', [EquipmentTypeController::class, 'index'])->name(
  'api.equipment-type.index'
);
