<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class ModalButton extends Component
{
    public $id;
    public $content;
    public $buttonClass;

    public function __construct($id, $content, $buttonClass)
    {
        $this->id = $id;
        $this->content = $content;
        $this->buttonClass = $buttonClass;
    }

    public function render()
    {
        return view('blade-components::components.modal-button');
    }
}
