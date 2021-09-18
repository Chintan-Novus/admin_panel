<?php

namespace Novuslogics\AdminPanel\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('admin_panel::layout.guest');
    }
}
