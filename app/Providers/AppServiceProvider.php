<?php

namespace App\Providers;

use App\Http\Resources\EquipmentResource;
use App\Http\Resources\EquipmentTypeResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    EquipmentTypeResource::withoutWrapping();
    EquipmentResource::withoutWrapping();
  }
}
