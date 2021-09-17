<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class Multiple extends Component
{
    public $label;
    public $sortable;
    public $id;

    public function __construct($label = null, $sortable = false)
    {
        $this->label = $label;
        $this->sortable = $sortable;
        $this->id = Str::random(20);
    }

    public function render()
    {
        return view('blade-components::components.multiple');
    }
}
