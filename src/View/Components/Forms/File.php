<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class File extends Component
{
    public $name;
    public $label;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label = null, $required = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.file');
    }
}
