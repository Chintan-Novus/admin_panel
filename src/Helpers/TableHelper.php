<?php

namespace Novuslogics\AdminPanel\Helpers;

use Novuslogics\AdminPanel\Helpers\BladeHelper;
use Novuslogics\AdminPanel\Helpers\ThemeHelper;

class TableHelper
{
    public static function checkbox($id): string
    {
        return "<div class='form-check form-check-sm form-check-custom form-check-solid'>
                    <input type='checkbox' class='form-check-input' value='{$id}'>
                </div>";
    }

    public static function avatar($title, $link, $avatar, $path, $description = null): string
    {
        $shortName = BladeHelper::symbolName($title);
        $avatarURL = Helper::glideImage("$path/$avatar", 100, 100, 'fill');
        $symbol = Helper::fileExists('public/uploads/' . $path . '/', $avatar) ? "<img src='{$avatarURL}' class='h-50px w-50px' />" : "<div class='symbol-label fs-2 fw-bold text-success'>{$shortName}</div>";

        $descriptionSpan = (!empty($description)) ? "<span>$description</span>" : "";

        return "<div class='symbol symbol-50px overflow-hidden me-3'>
                    <a href='$link'>
                        {$symbol}
                    </a>
                </div>
                <div class='d-flex flex-column'>
                    <a href='$link' class='text-gray-800 text-hover-primary mb-1'>
                        {$title}
                    </a>
                    {$descriptionSpan}
                </div>";
    }

    public static function link($title, $link): string
    {
        return "<a href='$link' class='text-gray-800 text-hover-primary mb-1'>$title</a>";
    }

    public static function action($edit = null, $delete = null, $show = null): string
    {
        $icons = [
            'edit' => ThemeHelper::getIcons('edit', 'svg-icon-3'),
            'delete' => ThemeHelper::getIcons('delete', 'svg-icon-3'),
            'show' => ThemeHelper::getIcons('details', 'svg-icon-3'),
        ];

        $links = [];
        if (!empty($show)) {
            $links[] = "<a href='{$show}' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1'>{$icons['show']}</a>";
        }
        if (!empty($edit)) {
            $links[] = "<a href='{$edit}' class='btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1'>{$icons['edit']}</a>";
        }
        if (!empty($delete)) {
            $links[] = "<a href='{$delete['url']}' class='btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1' datatable-filter='delete_row' data-id='{$delete['id']}'>{$icons['delete']}</a>";
        }

        $buttons = implode("", $links);

        return "<div class='d-flex justify-content-end flex-shrink-0'>
                    $buttons
                </div>";
    }
}
