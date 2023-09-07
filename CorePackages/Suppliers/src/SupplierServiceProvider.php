<?php

namespace Peal\CorePackages\Suppliers;

use Illuminate\Support\ServiceProvider;
use Peal\CorePackages\Suppliers\Task\SupplierTask;
use Peal\CorePackages\Suppliers\Contracts\SupplierContract;

class SupplierServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__.'/routes.php';

        //$this->app->bind('Peal\\CorePackages\\Suppliers\\Contracts\\SupplierContract', 'Peal\\CorePackages\\Suppliers\Task\\SupplierInsert');

        $this->app->bind(SupplierContract::class,SupplierTask::class);
    }
}
