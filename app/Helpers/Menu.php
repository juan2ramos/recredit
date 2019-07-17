<?php


namespace App\Helpers;


class Menu
{
    public static function active($path)
    {
        return request()->is($path) == $path ? 'active' : '';
    }
}
