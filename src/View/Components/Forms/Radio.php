<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Radio extends Component
{
    public $name;
    public $labels;
    public $selected;
    public $values;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $labels, $selected = null, $values = null)
    {
        $this->name = $name;
        $this->labels = $labels;
        $this->selected = $selected;
        $this->values = $values;
    }

    public function selected($value)
    {
        if (isset($this->selected) && $value === $this->selected) {
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
        return view('blade-components::components.forms.radio');
    }
}
