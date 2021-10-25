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

    public static function glideImage($path, $width = 100, $height = null, $fit = "contain"): string
    {
        $isSVG = (strpos($path, '.svg') > -1);

        $data = [];

        if (!$isSVG) {
            $data = [
                'w' => $width,
                'h' => $height,
                'fit' => $fit,
            ];
        }

        return route('image.show', $path."?".http_build_query($data));
    }
}
