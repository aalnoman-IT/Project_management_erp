<?php

namespace App\Providers;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Schema;
  use Filament\Support\Facades\FilamentIcon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


        {
            If (env('APP_ENV') !== 'local') {
                $this->app['request']->server->set('HTTPS', true);
            }
    
            Schema::defaultStringLength(191);
        }

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Project Management',
                'Task Management',
                'Members',
                'Financial Activities',
                'System Management'

            ]);

          
 
            FilamentIcon::register([
                // 'panels::topbar.global-search.field' => 'fas-magnifying-glass',
                // 'panels::sidebar.group.collapse-button' => view('icons.chevron-up'),
            ]);
        });
    }
    
}
