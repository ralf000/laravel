<?php

namespace App\Policies;

use App\Page;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Посмотреть для какой модели описан данный класс
 * @see App\Providers\AuthServiceProvider::$policies
 */
class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Описываем методы проверки для модели Page
     * Далее эти проверки можно применить в контроллере через вызов
     * if (\Gate::denies('add', $page))
     * @param User $user
     * @return bool
     */
    public function add(User $user)
    {
        foreach ($user->roles as $role) {
            if ($role->name === 'Administrator')
                return true;
        }
        return false;
    }

    /**
     * Описываем методы проверки для модели Page
     * Далее эти проверки можно применить в контроллере через вызов
     * if (\Gate::allows('update', $page))
     * @param User $user
     * @return bool
     */
    public function update(User $user, Page $page)
    {
        foreach ($user->roles as $role) {
            if ($role->name === 'Administrator' && $user->id === $page->user_id) {
                return true;
            }
        }
        return false;
    }

    /**
     * Данный метод выполяется ПЕРЕД проверкой прав (методы add и update)
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        foreach ($user->roles as $role) {
            if ($role->name === 'Administrator') {
                return true;
            }
        }
        return false;
    }
}
