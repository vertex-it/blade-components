<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Toggle extends BaseInputComponent
{
    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $comment = null,
        $inline = null,
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);
    }

    public function render()
    {
        return view('blade-components::components.inputs.toggle');
    }
}
