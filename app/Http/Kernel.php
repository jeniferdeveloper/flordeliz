<?php

namespace FlorDeLiz\Http;

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
         \FlorDeLiz\Http\Middleware\EncryptCookies::class,
         \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
         \Illuminate\Session\Middleware\StartSession::class,
         \Illuminate\View\Middleware\ShareErrorsFromSession::class,
         \FlorDeLiz\Http\Middleware\VerifyCsrfToken::class,
         \LucaDegasperi\OAuth2Server\Middleware\OAuthExceptionHandlerMiddleware::class,
         \Barryvdh\Cors\HandleCors::class,
     ];
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \FlorDeLiz\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \FlorDeLiz\Http\Middleware\RedirectIfAuthenticated::class,
        'auth.checkrole' => \FlorDeLiz\Http\Middleware\CheckRole::class,
        'oauth.checkrole' => \FlorDeLiz\Http\Middleware\OAuthCheckRole::class,
//        'csrf' => \FlorDeLiz\Http\Middleware\VerifyCsrfToken::class,
        'oauth' => \LucaDegasperi\OAuth2Server\Middleware\OAuthMiddleware::class,
        'oauth-user' => \LucaDegasperi\OAuth2Server\Middleware\OAuthUserOwnerMiddleware::class,
        'oauth-Client' => \LucaDegasperi\OAuth2Server\Middleware\OAuthClientOwnerMiddleware::class,
        'check-authorization-params' => \LucaDegasperi\OAuth2Server\Middleware\CheckAuthCodeRequestMiddleware::class,
//        'cors' => \FlorDeLiz\Http\Middleware\Cors::class, // <<< add this line
    ];
}
