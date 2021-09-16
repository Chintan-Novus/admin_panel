<?php

namespace NovusLogics\AdminPanel\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('layout.app');
    }
}
