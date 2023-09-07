<?php

namespace Peal\CorePackages\Category;

use Illuminate\Support\ServiceProvider;
use Peal\CorePackages\Category\Contracts\CategoryContract;
use Peal\CorePackages\Category\Task\CategoryTask;

class CategoryServiceProvider extends ServiceProvider
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
        //require __DIR__.'/routes.php';

        //$this->app->bind('Peal\\CorePackages\\Suppliers\\Contracts\\SupplierContract', 'Peal\\CorePackages\\Suppliers\Task\\SupplierInsert');

        $this->app->bind(CategoryContract::class, CategoryTask::class);
    }
}
