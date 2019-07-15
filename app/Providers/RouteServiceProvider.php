<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        parent::boot();
    }


    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapFrontRoutes();

        $this->mapAdminRoutes();

        $this->mapCreditRequestRoutes();

        $this->mapSMSRoutes();

        //
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }


    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    protected function mapFrontRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/front.php'));
    }

    protected function mapCreditRequestRoutes()
    {
        Route::middleware('web')
            ->namespace('App\Modules\CreditRequest\Controllers')
            ->group(base_path('app/Modules/CreditRequest/routes.php'));
    }

    protected function mapSMSRoutes()
    {
        Route::middleware(['web', 'auth', 'withoutCredit'])
            ->namespace('App\Modules\SMS')
            ->group(base_path('app/Modules/SMS/routes.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Admin')
            ->group(base_path('routes/admin.php'));
    }
}
