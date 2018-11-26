<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes(); // Web Route is being used for managin the applicatoin

        $this->mapAddonRoutes(); // Addon Route is being used for managin the Addons

        $this->mapStudentRoutes(); // Addon Route is being used for managin the Student

        //$this->mapInstallRoutes(); // Install route is being used for managing the installation process
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapInstallRoutes()
    {
        Route::middleware('install')
             ->namespace($this->namespace)
             ->group(base_path('routes/install.php'));
    }

    protected function mapAddonRoutes()
    {
        Route::middleware('addon')
             ->namespace($this->namespace)
             ->group(base_path('routes/addon.php'));
    }

    protected function mapStudentRoutes()
    {
        Route::middleware('student')
             ->namespace($this->namespace)
             ->group(base_path('routes/student.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
