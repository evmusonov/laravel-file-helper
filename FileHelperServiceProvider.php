<?php

namespace Evmusonov\LaravelFileHelper;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class FileHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //регистрируем конфиг
        $this->mergeConfigFrom(__DIR__ . '/config/filehelper.php', 'filehelper');
        $this->publishes([
            __DIR__.'/config' => base_path('config'),
        ]);
        $modules = config("filehelper.laravel-file-helper");
        $dir = app_path().'/Laravel-file-helper';
        // dd($dir);
        if($modules) {
            while (list(,$module) = each($modules)){
                // dd(file_exists($dir.'/'.$module.'/Routes/routes.php'));
                //Подключаем роуты для модуля
                if(file_exists($dir.'/'.$module.'/Routes/routes.php')) {
                    $this->loadRoutesFrom($dir.'/'.$module.'/Routes/routes.php');
                }
                //Загружаем View
                //view('test::admin')
                if(is_dir($dir.'/'.$module.'/Views')) {
                    $this->loadViewsFrom($dir.'/'.$module.'/Views', $module);
                }
                //Подгружаем миграции
                if(is_dir($dir.'/'.$module.'/Migration')) {
                    $this->loadMigrationsFrom($dir.'/'.$module.'/Migration');
                }
                //Подгружаем переводы
                //trans('test::messages.welcome')
                if(is_dir($dir.'/'.$module.'/Lang')) {
                    $this->loadTranslationsFrom($dir.'/'.$module.'/Lang', $module);
                }
            }
        }
    }

    public function register()
    {
    }
}
