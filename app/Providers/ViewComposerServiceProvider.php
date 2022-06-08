<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Lo que hay aqui dentro es lo primero que se ejecuta en laravel
        //La primera linea dice en que vista quiero tener disponible el contenido definido en la segunda linea

        view()->composer([
            'admin.pages.products.index', 'front.pages.tickets.index'],
            'App\Http\ViewComposers\Admin\ProductCategories',
            'App\Http\ViewComposers\Front\ProductCategories');
        

        
    }
}
