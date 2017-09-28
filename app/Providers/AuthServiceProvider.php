<?php

namespace App\Providers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addDays(15));
//        Passport::tokensExpireIn(Carbon::now()->addHours(1));
//        Passport::refreshTokensExpireIn(Carbon::now()->addDays(1));
        Gate::define('admin', function($user){
            return $user->userable instanceof Admin;
     });
    }
}
