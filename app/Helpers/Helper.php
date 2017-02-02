<?php

namespace App\Helpers;

use App\Page;

class Helper
{
    /**
     * Формирует главное меню сайта
     * @param array $addItems Дополнительные (статические) пункты меню
     * вида [title => '', 'alias' => '']
     * @return array
     */
    static public function getMainMenu(array $addItems) : array
    {
        $pages = Page::all();
        $menu = [];
        foreach ($pages as $page) {
            $menu[] = [
                'title' => $page->title,
                'alias' => $page->alias
            ];
        }
        return array_merge($menu, $addItems);
    }
}