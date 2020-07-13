<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Date extends BaseInputComponent
{
    public $time;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = null,
        $comment = null,
        $inline = null,
        $time = null
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->time = $time;
    }

    public function render()
    {
        return view('blade-components::components.inputs.date');
    }
}
