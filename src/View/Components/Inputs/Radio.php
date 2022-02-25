<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\Traits\HasOptions;
use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Radio extends BaseInputComponent
{
    use HasOptions;

    public ?array $options;

    public function __construct(
        $name,
        $options,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $comment = null,
        $inline = null,
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->options = $options;
    }

    public function render()
    {
        return view('blade-components::components.inputs.radio');
    }
}
