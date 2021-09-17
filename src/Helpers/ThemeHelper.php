<?php

namespace NovusLogics\AdminPanel\Helpers;

use Illuminate\Support\Facades\Route;

class ThemeHelper
{
    public static function asideMenu(): string
    {
        $items = "";

        foreach (config('admin_panel.menu.aside') as $menu) {
            if (isset($menu['sub_menu'])) {
                $subItems = "";
                foreach ($menu['sub_menu'] as $sub_menu) {
                    $subItems .= self::asideMenuItem($sub_menu);
                }

                $subMenuActiveClass = "";
                $subMenuClass = "";
                if (in_array(Route::currentRouteName(), collect($menu['sub_menu'])->pluck('link')->toArray())) {
                    $subMenuClass .= " here show";
                    $subMenuActiveClass = "active";
                }

                $items .= "<div class='menu-item menu-accordion {$subMenuClass}' data-kt-menu-trigger='click'>
                                <span class='menu-link'>
                                    <span class='menu-icon'>
                                        <i class='{$menu['icon']}'></i>
                                    </span>
                                    <span class='menu-title'>{$menu['title']}</span>
                                    <span class='menu-arrow'></span>
                                </span>
                                <div class='menu-sub menu-sub-accordion menu-active-bg {$subMenuActiveClass}'>
                                    {$subItems}
                                </div>
                            </div>";
            } elseif (isset($menu['link'])) {
                $items .= self::asideMenuItem($menu);
            } else {
                $items .= self::asideMenuSection($menu);
            }
        }

        return "<div class='menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500' id='#kt_aside_menu' data-kt-menu='true'>{$items}</div>";
    }

    private static function asideMenuSection($menu): string
    {
        return "<div class='menu-item'>
                    <div class='menu-content pt-8 pb-2'>
                        <span class='menu-section text-muted text-uppercase fs-8 ls-1'>{$menu['title']}</span>
                    </div>
                </div>";
    }

    private static function asideMenuItem($menu): string
    {
        $iconBullet = (isset($menu['icon'])) ? "<span class='menu-icon'><i class='{$menu['icon']}'></i></span>" : "<span class='menu-bullet'><span class='bullet bullet-dot'></span></span>";
        $activeClass = (Route::currentRouteName() === $menu['link'] ? "active" : "");
        $link = route($menu['link']);

        return "<div class='menu-item'>
                    <a class='menu-link {$activeClass}' href='{$link}'>
                        {$iconBullet}
                        <span class='menu-title'>{$menu['title']}</span>
                    </a>
                </div>";
    }

    public static function headerMenu(): string
    {
        $items = "";
        foreach (config('admin_panel.menu.header') as $menu) {
            if (isset($menu['sub_menu'])) {
                $subItems = "";
                foreach ($menu['sub_menu'] as $sub_menu) {
                    $subItems .= self::headerMenuItem($sub_menu);
                }

                $icon = (isset($menu['icon'])) ? "<span class='menu-icon'><i class='{$menu['icon']}'></i></span>" : "";
                $subMenuClass = "";
                if (in_array(Route::currentRouteName(), collect($menu['sub_menu'])->pluck('link')->toArray())) {
                    $subMenuClass .= "here show";
                }

                $items .= "<div data-kt-menu-trigger='click' data-kt-menu-placement='bottom-start' class='menu-item menu-lg-down-accordion me-lg-1 {$subMenuClass}'>
                                <span class='menu-link py-3'>
                                    {$icon}
                                    <span class='menu-title'>{$menu['title']}</span>
                                    <span class='menu-arrow d-lg-none'></span>
                                </span>
                                <div class='menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px'>{$subItems}</div>
                            </div>";
            } else {
                $items .= self::headerMenuItem($menu, "me-lg-1");
            }
        }

        return $items;
    }

    private static function headerMenuItem($menu, $class = null): string
    {
        $icon = (isset($menu['icon'])) ? "<span class='menu-icon'><i class='{$menu['icon']}'></i></span>" : "";
        $activeClass = (Route::currentRouteName() === $menu['link'] ? "active" : "");
        $link = route($menu['link']);

        return "<div class='menu-item {$class}'>
                    <a class='menu-link py-3 {$activeClass}' href='{$link}'>
                        {$icon}
                        <span class='menu-title'>{$menu['title']}</span>
                    </a>
                </div>";
    }

    public static function footerMenu(): string
    {
        $items = "";
        foreach (config('admin_panel.menu.footer') as $menu) {
            $items .= self::footerMenuItem($menu);
        }

        return "<ul class='menu menu-gray-600 menu-hover-primary fw-bold order-1'>{$items}</ul>";
    }

    private static function footerMenuItem($menu): string
    {
        return "<li class='menu-item'>
                    <a href='{$menu['link']}' class='menu-link px-2' target='_blank'>{$menu['title']}</a>
                </li>";
    }
}
