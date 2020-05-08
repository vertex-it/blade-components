<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class ImageCropper extends Component
{
    public $name;
    public $value;
    public $required;
    public $aspectRatioX;
    public $aspectRatioY;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null, $aspectRatio = null, $required = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
        $this->aspectRatioX = $aspectRatio[0];
        $this->aspectRatioY = $aspectRatio[1];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.image-cropper');
    }
}
