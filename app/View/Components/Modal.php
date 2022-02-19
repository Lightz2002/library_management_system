<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{

    public $method;
    public $action;
    public $title;
    public $enctype;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $method, $title, $enctype = 'application/x-www-form-urlencoded	')
    {
        //
        $this->action = $action;
        $this->method = $method;
        $this->title = $title;
        $this->enctype = $enctype;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
