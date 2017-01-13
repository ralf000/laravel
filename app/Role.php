<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * На случай если будет ошибка можно разрешить изменение поля name
     * @var bool
     */
//    protected $fillable = ['name'];

    public $timestamps = false;

    /**
     * Many to Many
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user');//второй аргумент можно опустить
    }
}
