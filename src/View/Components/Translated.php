<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class Translated extends Component
{
    public $languages;
    public $id;

    public function __construct($languages)
    {
        $this->languages = $languages;
        $this->id = uniqid();
    }

    public function render()
    {
        return view('blade-components::components.translated');
    }
}
