<?php

namespace Sepehrfci\RolePermissoion\Providers;

use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends  ServiceProvider
{

    public function register()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'RolePermission');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/role_permission_routes.php');
        $this->loadJsonTranslationsFrom(__DIR__ . '/../Resources/Lang');
    }

    public function boot()
    {
        $this->app->booted(function () {
            config()->set('sidebar.items.RolePermission', [
                'title' => 'سطوح دسترسی',
                'url' => route('roles-permissions.index'),
                'icon' => 'i-RolePermission'
            ]);
        });
    }
}
