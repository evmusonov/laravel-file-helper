<?php

namespace Evmusonov\LaravelFileHelper;

use Illuminate\Support\ServiceProvider;

class FileHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/filehelper.php' => config_path('filehelper.php'),
        ]);

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }

    public function register()
    {
    }
}
