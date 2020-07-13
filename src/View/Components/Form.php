<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $method;
    public $multipart;
    public $buttonText;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $method = null, $multipart = null, $buttonText = null)
    {
        $this->action = $action;
        $this->method = $method;
        $this->multipart = $multipart;
        $this->buttonText = $buttonText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.form');
    }
}
