<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

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
        Gate::define('view-admin', function(User $user){
            // return $user->isAdmin(); -> this is possible if there is a defined method in User Model
            // if($user->id === 1){
            //     return Response::allow();
            // }
            // return Response::denyAsNotFound();

            return $user->isAdmin() ? Response::allow() :Response::denyAsNotFound();
        });
    }
}
