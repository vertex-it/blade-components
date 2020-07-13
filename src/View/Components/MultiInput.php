<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use Illuminate\View\Component;

class MultiInput extends Component
{
    public $name;
    public $inputs;
    public $required;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $inputs, $required = null)
    {
        // dd($inputs);
        $this->name = $name;
        $this->inputs = $inputs;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.inputs.multi-input');
    }
}
