<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\Traits\HasOptions;
use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Select extends BaseInputComponent
{
    use HasOptions;

    public array $options;
    public bool $selectize;
    public bool $multiple;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $comment = null,
        $inline = null,
        $options = [],
        $selectize = false,
        $multiple = false,
        $width = null,
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline, $width);

        $this->options = $options;
        $this->selectize = $selectize;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('blade-components::components.inputs.select');
    }
}
