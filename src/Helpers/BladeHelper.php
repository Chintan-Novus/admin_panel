<?php

namespace Novuslogics\AdminPanel\Helpers;

use Illuminate\Support\Str;

class BladeHelper
{
    public static function pageTitle($title = null): string
    {
        return implode(' | ', array_filter([
            config('app.name'), ucfirst($title)
        ]));
    }

    public static function symbolName(string $name): string
    {
        $nameArray = preg_split("/[\s,_-]+/", $name);

        switch (count($nameArray)) {
            case 0:
                $return = "N/A";
                break;
            case 1:
                $return = Str::substr($nameArray[0], 0, 2);
                break;
            default:
                $return = Str::substr($nameArray[0], 0, 1) . Str::substr($nameArray[1], 0, 1);
                break;
        }

        return Str::upper($return);
    }
}
