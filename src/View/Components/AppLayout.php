<?php

namespace Novuslogics\AdminPanel\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $pageTitle;
    public $pageMeta;
    public $toolbarTitle;
    public $toolbarDescription;
    public $toolbarButtons;
    public $toolbarDeleteAction;

    public function __construct($pageTitle = null, $pageMeta = null, $toolbarTitle = null, $toolbarDescription = null, $toolbarButtons = null, $toolbarDeleteAction = null)
    {
        //
        $this->pageTitle = $pageTitle;
        $this->pageMeta = $pageMeta;
        $this->toolbarTitle = $toolbarTitle;
        $this->toolbarDescription = $toolbarDescription;
        $this->toolbarButtons = $toolbarButtons;
        $this->toolbarDeleteAction = $toolbarDeleteAction;
    }

    public function render()
    {
        return view('admin_panel::layout.app');
    }
}
