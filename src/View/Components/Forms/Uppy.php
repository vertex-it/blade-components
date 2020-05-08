<?php

namespace VertexIt\BladeComponents\View\Components\Forms;

use Illuminate\View\Component;

class Uppy extends Component
{
    public $name;
    public $note;
    public $key;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $route, $note = null)
    {
        $this->name = $name;
        $this->note = $note;
        $this->key = uniqid();
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('blade-components::components.forms.uppy');
    }
}
