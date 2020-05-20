<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class ImageCropper extends Component
{
    public $name;
    public $value;
    public $label;
    public $required;
    public $aspectRatioX;
    public $aspectRatioY;

    public function __construct(
        $name,
        $value = null,
        $label = null,
        $aspectRatio = null,
        $required = null
    )
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->required = $required;
        $this->aspectRatioX = $aspectRatio[0];
        $this->aspectRatioY = $aspectRatio[1];
    }

    public function render()
    {
        return view('blade-components::components.forms.image-cropper');
    }
}
