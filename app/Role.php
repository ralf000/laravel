<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Many to Many
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');//второй аргумент можно опустить
    }
}
