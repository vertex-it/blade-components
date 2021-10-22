<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class ModalButton extends Component
{
    public $id;
    public $title;
    public $content;
    public $icon;
    public $buttonClass;
    public $confirmButtonClass;

    public function __construct($id, $title, $content, $buttonClass, $confirmButtonClass = null, $icon = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->icon = $icon;
        $this->buttonClass = $buttonClass;
        $this->confirmButtonClass = $confirmButtonClass;
    }

    public function render()
    {
        return view('blade-components::components.modal-button');
    }
}
