<?php

namespace App\Helpers_;

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
            case 1:
                $return = Str::substr($nameArray[0], 0, 2);
                break;
            case 2:
                $return = Str::substr($nameArray[0], 0, 1) . Str::substr($nameArray[1], 0, 1);
                break;
            default:
                $return = "N/A";
                break;
        }

        return Str::upper($return);
    }
}
