<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $label;
    public $value;
    public $placeholder;
    public $required;

    public function __construct(
        $name,
        $type,
        $label = null,
        $value = null,
        $placeholder = null,
        $required = null
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    public function render()
    {
        return view('blade-components::components.forms.input');
    }
}
