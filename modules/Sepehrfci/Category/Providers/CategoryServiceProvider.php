<?php
namespace Sepehrfci\Category\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/categories_routes.php');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views/','Category');
        $this->loadMigrationsFrom(__DIR__ .'/../Database/Migrations/');
    }

    public function boot()
    {
        $this->app->booted(function (){
            config()->set('sidebar.items.categories',[
                'title' => 'دسته بندی ها',
                'url' => route('categories.index'),
                'icon' => 'i-categories'
            ]);
        });
    }
}
