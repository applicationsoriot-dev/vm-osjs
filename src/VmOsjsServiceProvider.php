<?php

declare(strict_types=1);

namespace Geodit\VmOsjs;

use Geodit\VmOsjs\Adapters\Null\NullVmActorResolver;
use Geodit\VmOsjs\Adapters\Null\NullVmLogoutHandler;
use Geodit\VmOsjs\Adapters\Null\NullVmTenantProvider;
use Geodit\VmOsjs\Contracts\VmActorResolverInterface;
use Geodit\VmOsjs\Contracts\VmLogoutHandlerInterface;
use Geodit\VmOsjs\Contracts\VmTenantProviderInterface;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class VmOsjsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/vm.php', 'vm_osjs');

        $this->app->singleton(VmManager::class);

        $this->app->bind(VmActorResolverInterface::class, function ($app) {
            $class = config('vm_osjs.adapters.actor', NullVmActorResolver::class);
            return $app->make($class);
        });

        $this->app->bind(VmTenantProviderInterface::class, function ($app) {
            $class = config('vm_osjs.adapters.tenant', NullVmTenantProvider::class);
            return $app->make($class);
        });

        $this->app->bind(VmLogoutHandlerInterface::class, function ($app) {
            $class = config('vm_osjs.adapters.logout', NullVmLogoutHandler::class);
            return $app->make($class);
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/vm.php' => config_path('vm_osjs.php'),
        ], 'vm-osjs-config');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'vm-osjs');

        Route::middleware('web')->group(__DIR__ . '/../routes/web.php');
    }
}
