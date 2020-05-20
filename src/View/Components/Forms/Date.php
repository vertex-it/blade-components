<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Date extends Component
{
    public $name;
    public $value;
    public $label;
    public $time;
    public $placeholder;

    public function __construct($name, $value = null, $label = null, $time = null, $placeholder = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->time = $time;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('blade-components::components.forms.date');
    }
}
