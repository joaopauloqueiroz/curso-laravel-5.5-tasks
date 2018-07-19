<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //registrar nossa classe treinaweb 
        //$this->app->bind('App\Services\Treinaweb', function($app){
            //return new \App\Services\Treinaweb('chavedeapi759824bdfibas');
        //});

        $this->app->bind(
            'App\Repositories\Interfaces\TaskRepositoryInterface',
            'App\Repositories\Implementations\EloquentTaskRepository'
        );
    }
}
