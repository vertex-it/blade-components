<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $method;
    public $multipart;
    public $button;
    public $buttonText;
    public $buttonClasses;

    public function __construct($action, $method = null, $multipart = null, $button = true, $buttonText = null, $buttonClasses = null)
    {
        $this->action = $action;
        $this->method = $method;
        $this->multipart = $multipart;
        $this->button = $button;
        $this->buttonText = $buttonText;
        $this->buttonClasses = $buttonClasses;
    }

    public function render()
    {
        return view('blade-components::components.form');
    }
}
