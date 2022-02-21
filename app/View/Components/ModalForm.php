<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalForm extends Component
{
    public $title;
    public $action;
    public $method;
    public $enctype;
    public $showHeader;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $method, $enctype = 'application/x-www-form-urlencoded', $title, $showHeader = true)
    {
        $this->title = $title;
        $this->action = $action;
        $this->method = $method;
        $this->enctype = $enctype;
        $this->showHeader = $showHeader;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-form');
    }
}
