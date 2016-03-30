<?php

namespace SAC\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \SAC\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \SAC\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \SAC\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \SAC\Http\Middleware\RedirectIfAuthenticated::class,
        'administrador' => \SAC\Http\Middleware\Administrador::class,
        'supervisor' => \SAC\Http\Middleware\Supervisor::class,
        'contador' => \SAC\Http\Middleware\Contador::class,
        'residente' => \SAC\Http\Middleware\Residente::class,
        'contador_sup' => \SAC\Http\Middleware\ContadorSup::class,
        'residente_sup' => \SAC\Http\Middleware\ResidenteSup::class,
        'residente_cont' => \SAC\Http\Middleware\ResidenteCont::class,
    ];
}
