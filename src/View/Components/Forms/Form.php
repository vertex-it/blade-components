<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $method;
    public $multipart;
    public $buttonName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $method = null, $multipart = null, $buttonName = null)
    {
        $this->action = $action;
        $this->method = $method;
        $this->multipart = $multipart;
        $this->buttonName = $buttonName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.form');
    }
}
