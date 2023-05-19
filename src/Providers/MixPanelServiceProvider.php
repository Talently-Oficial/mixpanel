<?php

namespace MixPanel\Providers;

use Illuminate\Support\ServiceProvider;
use MixPanel\MixPanelWebAnalyticsManager;
use Illuminate\Contracts\Foundation\Application;

class MixPanelServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->singleton(
            MixPanelWebAnalyticsManager::class,
            function (Application $app) {
               return new MixPanelWebAnalyticsManager($app);
            }
        );
        
        $this->mergeConfigFrom(
            __DIR__.'/../../config/mixpanel.php',
            'mixpanel'
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/mixpanel.php' => $this->app->configPath('mixpanel.php'),
            ], 'config');
        }
    }

}