<?php

namespace App\View\Components;

use Illuminate\View\Component;
use PhpOption\None;

class TextInput extends Component
{
    public $type = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        // Intialize variables that needs to pass to component
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.text-input');
    }
}
