<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Multiple extends Component
{
    public $label;
    public $id;

    public function __construct($label = null)
    {
        $this->label = $label;
        $this->id = Str::random(20);
    }

    public function render()
    {
        return view('blade-components::components.multiple');
    }
}
