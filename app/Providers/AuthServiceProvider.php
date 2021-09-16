<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use App\User;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function(User $user){
            return $user->type ==='Admin';
        });
        Gate::define('isDispatch', function(User $user){
            return $user->type ==='Dispatch';
        });
        Gate::define('isUser', function(User $user){
            return $user->type ==='user';
        });
        Gate::define('isEmployee', function(User $user){
            return $user->type ==='Employee';
        });
        Gate::define('isCustom', function(User $user){
            return $user->type ==='Customs';
        });
        Gate::define('isPayment', function(User $user){
            return $user->payment ==='Payment';
        });
        Passport::routes();

        //
    }
}
