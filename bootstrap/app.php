<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(\Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class);
        $middleware->web(\Illuminate\Session\Middleware\StartSession::class);
        $middleware->web(\Illuminate\View\Middleware\ShareErrorsFromSession::class);
        $middleware->web(\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class);
        $middleware->web(\Illuminate\Routing\Middleware\SubstituteBindings::class);
        $middleware->alias(['admin' => \App\Http\Middleware\AdminMiddleware::class]);
        $middleware->alias(['role' => \App\Http\Middleware\CheckRole::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
