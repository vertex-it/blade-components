<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Time extends Component
{
    public $name;
    public $value;
    public $label;
    public $placeholder;
    public $defaultTime;

    public function __construct($name, $value = null, $label = null, $placeholder = null, $defaultTime = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->defaultTime = $defaultTime;
    }

    public function render()
    {
        return view('blade-components::components.forms.time');
    }
}
