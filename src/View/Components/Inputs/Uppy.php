<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Uppy extends BaseInputComponent
{
    public string $key;
    public ?string $route;
    public int $maxFileSize;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $comment = null,
        $inline = null,
        $route = null,
        $maxFileSize = 2
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->key = uniqid();
        $this->route = $route;
        $this->maxFileSize = $maxFileSize;
    }

    public function render()
    {
        return view('blade-components::components.inputs.uppy');
    }
}
