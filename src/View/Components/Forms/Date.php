<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Date extends Component
{
    public $name;
    public $value;
    public $time;
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value = null, $time = null, $placeholder = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->time = $time;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.date');
    }
}
