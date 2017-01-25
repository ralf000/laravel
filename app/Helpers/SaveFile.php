<?php

namespace App\Helpers;


use App\Helpers\Contracts\ISaveStr;
use App\User;
use Illuminate\Http\Request;

class SaveFile implements ISaveStr
{
    public static function save(Request $request, User $user)
    {
        $obj = new self;
        $data = $obj->checkData($request->only(['name', 'text']));
        $str = $data['name'] . ' | ' . $data['text'];
        \Storage::prepend('str.txt', $str);
    }

    public function checkData($array)
    {
        return $array;
    }

}