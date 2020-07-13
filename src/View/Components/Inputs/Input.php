<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Input extends BaseInputComponent
{
    public $type;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = null,
        $comment = null,
        $inline = null,
        $type = 'text'
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->type = $type;
    }

    public function render()
    {
        return view('blade-components::components.inputs.input');
    }
}
