<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\Traits\HasOptions;
use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Checkbox extends BaseInputComponent
{
    use HasOptions;

    public $options;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $comment = null,
        $inline = null,
        $options = []
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->options = $options;
    }

    public function render()
    {
        return view('blade-components::components.inputs.checkbox');
    }
}
