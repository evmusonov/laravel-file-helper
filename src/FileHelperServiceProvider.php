<?php

namespace Evmusonov\LaravelFileHelper;

use Illuminate\Support\ServiceProvider;

class FileHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config' => base_path('config.php'),
        ]);
    }

    public function register()
    {
    }
}
