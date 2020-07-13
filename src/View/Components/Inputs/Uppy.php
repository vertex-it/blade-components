<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Uppy extends BaseInputComponent
{
    public $key;
    public $route;
    public $images;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = null,
        $comment = null,
        $inline = null,
        $route = null
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->key = uniqid();
        $this->route = $route;
    }

    public function render()
    {
        return view('blade-components::components.inputs.uppy');
    }
}
