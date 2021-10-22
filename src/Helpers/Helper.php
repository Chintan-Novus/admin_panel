<?php

namespace Novuslogics\AdminPanel\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function fileExists($path, $file): bool
    {
        if (empty($file)) {
            return false;
        }

        $filePath = $path.$file;

        return Storage::exists($filePath);
    }

    public static function glideImage($path, $width = 100, $height = null): string
    {
        $isSVG = (strpos($path, '.svg') > -1);

        if (!$isSVG && $width) {
            $path .= "?w={$width}";
        }
        if (!$isSVG && $height) {
            $path .= "?h={$height}";
        }

        return route('image.show', $path);
    }
}
