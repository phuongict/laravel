<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use function foo\func;

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

        Gate::before(function($user){
           if($user->isSuperAdmin()){
               return true;
           }
        });

        if(!$this->app->runningInConsole()){
            $permissions = Permission::all();
            $permissions->each(function($permission){
                Gate::define($permission->slug, function ($user) use ($permission){
                   return $user->hasPermissionInRole($permission);
                });
            });
        }
    }
}
