<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class Cropper extends BaseInputComponent
{
    public $aspectRatioX;
    public $aspectRatioY;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $comment = null,
        $inline = null,
        $aspectRatio = [],
        $width = null,
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline, $width);

        $this->aspectRatioX = $aspectRatio[0] ?? 0;
        $this->aspectRatioY = $aspectRatio[1] ?? 0;
    }

    public function render()
    {
        return view('blade-components::components.inputs.cropper');
    }
}
