<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class Multiple extends Component
{
    public $label;

    public function __construct($label)
    {
        $this->label = $label;
    }

    public function render()
    {
        return view('blade-components::components.multiple');
    }
}
