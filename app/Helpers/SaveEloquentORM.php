<?php

namespace App\Helpers;

use App\Helpers\Contracts\ISaveStr;
use App\User;
use Illuminate\Http\Request;

/**
 * Тестовый класс для того, чтобы посмотреть,
 * что из себя представляют интерфейсы
 * Class SaveEloquentORM
 * @package App\Helpers
 */
class SaveEloquentORM implements ISaveStr
{
    public static function save(Request $request, User $user)
    {
        $obj = new self;
        $data = $obj->checkData($request->only(['name', 'text']));
        $user->pages()->create($data);
    }

    public function checkData($array)
    {
        return $array;
    }

}