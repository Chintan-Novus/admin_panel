<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $pageTitle;
    public $pageMeta;
    public $toolbarTitle;
    public $toolbarButtons;

    public function __construct($pageTitle = null, $pageMeta = null, $toolbarTitle = null, $toolbarButtons = null)
    {
        //
        $this->pageTitle = $pageTitle;
        $this->pageMeta = $pageMeta;
        $this->toolbarTitle = $toolbarTitle;
        $this->toolbarButtons = $toolbarButtons;
    }

    public function render()
    {
        return view('layout.app');
    }
}
