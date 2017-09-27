<?php

namespace App\Providers;
use JansenFelipe\CnpjGratis\CnpjGratis;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Factory as FakerFactory;
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }
       $this->app->extend(FakerGenerator::class, function (){
          return FakerFactory::create('pt_BR');
       });
    }
}
