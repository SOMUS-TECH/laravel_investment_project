<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use App\View\Components\ongingComponent;
use App\View\Components\depositComponent;
use App\View\Components\favorusersComponent;
use App\View\Components\favourMatcheComponent;
use App\View\Components\historyComponent;
use App\View\Components\paytoComponent;
use App\View\Components\regulerusersComponent;
use App\View\Components\returnsComponent;
use App\View\Components\testimonyComponent;
use App\View\Components\unlockComponent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Blade::component('ongingcomponent',ongingComponent::class);
        Blade::component('depositcomponent',depositComponent::class);
        Blade::component('favoruserscomponent',favorusersComponent::class);
        Blade::component('favourmatchecomponent',favourMatcheComponent::class);
        Blade::component('historycomponent',historyComponent::class);
        Blade::component('paytocomponent',paytoComponent::class);
        Blade::component('reguleruserscomponent',regulerusersComponent::class);
        Blade::component('returnscomponent',returnsComponent::class);
        Blade::component('testimonycomponent',testimonyComponent::class);
        Blade::component('unlockcomponent',unlockComponent::class);
        




    }
}
