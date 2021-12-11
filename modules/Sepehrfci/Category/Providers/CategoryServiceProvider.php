<?php
namespace Sepehrfci\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/categories_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/','Category');
        $this->loadMigrationsFrom(__DIR__ .'/../Database/Migrations/');
    }
}
