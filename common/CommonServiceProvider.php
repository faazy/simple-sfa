<?php

namespace Common;


use App\Warehouse;
use Common\Auth\User;
use Common\Policies\UserPolicy;
use Common\Policies\WarehousePolicy;
use Gate;
use Illuminate\Support\ServiceProvider;
use Validator;

class CommonServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->registerPolicies();
        $this->registerCustomValidators();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerDevProviders();

    }


    /**
     * Register custom validation rules with laravel.
     */
    private function registerCustomValidators()
    {
        Validator::extend('hash', 'Common\Auth\Validators\HashValidator@validate');
        Validator::extend('email_confirmed', 'Common\Auth\Validators\EmailConfirmedValidator@validate');
    }


    private function registerPolicies()
    {
//        Gate::policy('App\Model', 'App\Policies\ModelPolicy');
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(Warehouse::class, WarehousePolicy::class);

    }


    private function registerDevProviders()
    {
        if ($this->app->environment() === 'production') return;

        if ($this->ideHelperExists()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        if ($this->clockworkExists()) {
            $this->app->register(\Clockwork\Support\Laravel\ClockworkServiceProvider::class);
        }
    }

    private function clockworkExists()
    {
        return class_exists(\Clockwork\Support\Laravel\ClockworkServiceProvider::class);
    }

    private function ideHelperExists()
    {
        return class_exists(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
    }
}
