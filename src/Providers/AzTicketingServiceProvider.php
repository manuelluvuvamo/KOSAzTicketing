<?php

namespace Kinsari\Azticketing\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Kinsari\Azticketing\Http\Middleware\HandleServerError;
use Kinsari\Azticketing\Services\AzTicketingAzureDevOpsService;
use Kinsari\Azticketing\Services\AzTicketingManagerService;

class AzTicketingServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        if (config('azticketing.enable_views')) {
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'azticketing');
        }

        $this->publishes([
            __DIR__ . '/../config/azticketing.php' => config_path('azticketing.php'),
        ], 'azticketing-config');

        $this->publishes([
            __DIR__.'/../resources/views/errors' => resource_path('views/vendor/azticketing/errors'),
        ], 'azticketing-views');

        $this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/azticketing'),
        ], 'azticketing-assets');

        $router = $this->app->make(Router::class);

        $router->pushMiddlewareToGroup('web', HandleServerError::class);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/azticketing.php', 'azticketing');

        $this->app->singleton(AzTicketingAzureDevOpsService::class, function () {
            return new AzTicketingAzureDevOpsService();
        });

        $this->app->singleton('AzTicketingManager', function ($app) {
            return new AzTicketingManagerService($app->make(AzTicketingAzureDevOpsService::class));
        });
    }
}
