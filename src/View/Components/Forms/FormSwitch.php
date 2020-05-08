<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class FormSwitch extends Component
{
    public $name;
    public $state;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $state)
    {
        $this->name = $name;
        $this->state = $state;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.form-switch');
    }
}
