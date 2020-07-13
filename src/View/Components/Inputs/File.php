<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class File extends BaseInputComponent
{
    public function render()
    {
        return view('blade-components::components.inputs.file');
    }
}
