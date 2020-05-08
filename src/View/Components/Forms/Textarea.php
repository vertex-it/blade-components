<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $value;
    public $wisywig;
    public $placeholder;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null, $wisywig = null, $placeholder = null, $required = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->wisywig = $wisywig;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.textarea');
    }
}
