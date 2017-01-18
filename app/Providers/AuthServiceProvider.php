<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        /**
         * Описываем новое правило для пользователей
         * Если возвращает true то действие разрешено
         * Вторым аргументом можно передать метод контроллера
         */
        //Gate::define('add-page', Controller@method)
        \Gate::define('add-page', function (User $user) {
            foreach ($user->roles as $role) {
                if ($role->name === 'Administrator')
                    return true;
            }
            return false;
        });

        \Gate::define('update-page', function (User $user, $page) {
            foreach ($user->roles as $role) {

                if ($role->name !== 'Administrator' || $user->id !== $page->user_id)
                    return false;

            }
            return true;
        });
    }
}
