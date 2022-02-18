<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type, $title = '')
    {
        //
        $this->name = $name;
        $this->type = $type;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
