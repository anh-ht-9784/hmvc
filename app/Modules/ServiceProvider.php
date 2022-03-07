<?php

namespace App\Modules;
use App\Providers\AuthServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class ServiceProvider extends  \Illuminate\Support\ServiceProvider{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot(){
        $listModule = array_map('basename', File::directories(__DIR__));
        foreach ($listModule as $module) {
            if(file_exists(__DIR__.'/'.$module.'/routes.php')) {
                include __DIR__.'/'.$module.'/routes.php';
            }
            if(is_dir(__DIR__.'/'.$module.'/Views')) {
                $this->loadViewsFrom(__DIR__.'/'.$module.'/Views', $module);
            }
        }
        $this->app->bind(AuthServiceProvider::class);
    }
    public function register(){
        $this->app->bind(AuthServiceProvider::class);
    }
}
