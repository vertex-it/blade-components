<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $options;
    public $label;
    public $values;
    public $selectize;
    public $multiple;
    public $required;

    public function __construct(
        $name,
        $options,
        $label = null,
        $values = null,
        $selectize = null,
        $multiple = null,
        $required = null
    )
    {
        $this->name = $name;
        $this->options = $options;
        $this->label = $label;
        $this->values = $values;
        $this->selectize = $selectize;
        $this->multiple = $multiple;
        $this->required = $required;
    }

    public function render()
    {
        return view('blade-components::components.forms.select');
    }

    /**
     * Determine if the given option is the current selected option.
     *
     * @param  string  $option
     * @return bool
     */
    public function isSelected($option)
    {
        if ($this->multiple) {
            return in_array($option, old($this->name) ?? [])
                || in_array($option, $this->values ?? []);
        }

        return $option === old($this->name);
    }
}
