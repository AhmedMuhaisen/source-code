<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();
        Gate::define('User.index',function($user){
            return(in_array('User.index',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('User.create',function($user){
            return(in_array('User.create',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('User.Update',function($user){
            return(in_array('User.Update',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('User.delete',function($user){
            return(in_array('User.delete',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('User.restore',function($user){
            return(in_array('User.restore',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('User.forceDelete',function($user){
            return(in_array('User.forceDelete',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('Employee.index',function($user){
            return(in_array('Employee.index',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('Employee.create',function($user){
            return(in_array('Employee.create',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.Update',function($user){
            return(in_array('Employee.Update',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.delete',function($user){
            return(in_array('Employee.delete',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.restore',function($user){
            return(in_array('Employee.restore',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Employee.forceDelete',function($user){
            return(in_array('Employee.forceDelete',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.index',function($user){
            return(in_array('Restaurant.index',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.create',function($user){
            return(in_array('Restaurant.create',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.Update',function($user){
            return(in_array('Restaurant.Update',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.delete',function($user){
            return(in_array('Restaurant.delete',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.restore',function($user){
            return(in_array('Restaurant.restore',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Restaurant.forceDelete',function($user){
            return(in_array('Restaurant.forceDelete',$user->role->permission->pluck('code')->toArray()));

            });

        Gate::define('Product.index',function($user){
            return(in_array('Product.index',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.create',function($user){
            return(in_array('Product.create',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.Update',function($user){
            return(in_array('Product.Update',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.delete',function($user){
            return(in_array('Product.delete',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.restore',function($user){
            return(in_array('Product.restore',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Product.forceDelete',function($user){
            return(in_array('Product.forceDelete',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.index',function($user){
            return(in_array('Order.index',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.create',function($user){
            return(in_array('Order.create',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.Update',function($user){
            return(in_array('Order.Update',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.delete',function($user){
            return(in_array('Order.delete',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.restore',function($user){
            return(in_array('Order.restore',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Order.forceDelete',function($user){
            return(in_array('Order.forceDelete',$user->role->permission->pluck('code')->toArray()));


        });

        Gate::define('Category.index',function($user){
            return(in_array('Category.index',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('Category.create',function($user){
            return(in_array('Category.create',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('Category.Update',function($user){
            return(in_array('Category.Update',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('Category.delete',function($user){
            return(in_array('Category.delete',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('Category.restore',function($user){
            return(in_array('Category.restore',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('Category.forceDelete',function($user){
            return(in_array('Category.forceDelete',$user->role->permission->pluck('code')->toArray()));
        });




        Gate::define('role.index',function($user){
            return(in_array('role.index',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role.create',function($user){
            return(in_array('role.create',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role.Update',function($user){
            return(in_array('role.Update',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role.delete',function($user){
            return(in_array('role.delete',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role.restore',function($user){
            return(in_array('role.restore',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role.forceDelete',function($user){
            return(in_array('role.forceDelete',$user->role->permission->pluck('code')->toArray()));
        });




        Gate::define('permission.index',function($user){
            return(in_array('permission.index',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('permission.create',function($user){
            return(in_array('permission.create',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('permission.Update',function($user){
            return(in_array('permission.Update',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('permission.delete',function($user){
            return(in_array('permission.delete',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('permission.restore',function($user){
            return(in_array('permission.restore',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('permission.forceDelete',function($user){
            return(in_array('permission.forceDelete',$user->role->permission->pluck('code')->toArray()));
        });





        Gate::define('role-permission.index',function($user){
            return(in_array('role-permission.index',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-permission.create',function($user){
            return(in_array('role-permission.create',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-permission.Update',function($user){
            return(in_array('role-permission.Update',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-permission.delete',function($user){
            return(in_array('role-permission.delete',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-permission.restore',function($user){
            return(in_array('role-permission.restore',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-permission.forceDelete',function($user){
            return(in_array('role-permission.forceDelete',$user->role->permission->pluck('code')->toArray()));
        });




        Gate::define('role-user.index',function($user){
            return(in_array('role-user.index',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-user.create',function($user){
            return(in_array('role-user.create',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-user.Update',function($user){
            return(in_array('role-user.Update',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-user.delete',function($user){
            return(in_array('role-user.delete',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-user.restore',function($user){
            return(in_array('role-user.restore',$user->role->permission->pluck('code')->toArray()));
        });

        Gate::define('role-user.forceDelete',function($user){
            return(in_array('role-user.forceDelete',$user->role->permission->pluck('code')->toArray()));
        });

    }
}
