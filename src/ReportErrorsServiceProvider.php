<?php

namespace Clicko\ReportErrors;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Clicko\ReportErrors\Exceptions\Handler;

class ReportErrorsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            ExceptionHandler::class,
            Handler::class
        );
    }

    public function boot()
    {
        // Publicar la configuración
        $this->publishes([
            __DIR__.'/../config/reporterrors.php' => config_path('reporterrors.php'),
        ], 'config');

        // Cargar vistas del paquete
        $this->loadViewsFrom(__DIR__.'/Views', 'reporterrors');
    }
}
