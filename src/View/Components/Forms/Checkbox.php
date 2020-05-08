<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $name;
    public $labels;
    public $values;
    public $selected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $labels, $values = null, $selected = null)
    {
        $this->name = $name;
        $this->labels = $labels;
        $this->values = $values;
        $this->selected = $selected;
    }

    public function selected($value)
    {
        if (isset($this->selected) && in_array($value, $this->selected)) {
            return true;
        }

        return false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.checkbox');
    }
}
