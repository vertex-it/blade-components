<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class MultipleRow extends Component
{
    public bool $sortable;

    public function __construct($sortable = true)
    {
        $this->sortable = $sortable;
    }

    public function render()
    {
        return view('blade-components::components.multiple-row');
    }
}
