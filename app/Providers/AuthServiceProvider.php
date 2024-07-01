<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}





// // app/Providers/AuthServiceProvider.php

// namespace App\Providers;

// use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Support\Facades\Gate;

// class AuthServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any authentication / authorization services.
//      *
//      * @return void
//      */
//     public function boot()
//     {
//         $this->registerPolicies();

//         foreach ($this->getPermissions() as $permission) {
//             Gate::define($permission->name, function ($user) use ($permission) {
//                 return $user->hasPermissionTo($permission);
//             });
//         }
//     }

//     /**
//      * Get the permissions defined in the system.
//      *
//      * @return \Illuminate\Database\Eloquent\Collection
//      */
//     protected function getPermissions()
//     {
//         // Use the appropriate namespace for your Permission model
//         return \App\Models\Permission::all();
//     }
// }
