<?php
namespace Sepehrfci\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/dashboard_routes.php');
        $this->loadViewsFrom(__DIR__ .'/../Resources/Views','Dashboard');
        $this->mergeConfigFrom(__DIR__ . '/../Config/Sidebar.php','sidebar');
    }

    public function boot()
    {
        $this->app->booted(function (){
            config()->set('sidebar.items.dashboard',[
                'title' => 'پیشخوان',
                'url' => route('dashboard'),
                'icon' => 'i-dashboard'
            ]);
        });
    }
}
