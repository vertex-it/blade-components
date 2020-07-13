<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Textarea extends BaseInputComponent
{
    public $richText;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = null,
        $comment = null,
        $inline = null,
        $richText = null
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->richText = $richText;
    }

    public function render()
    {
        return view('blade-components::components.inputs.textarea');
    }
}
