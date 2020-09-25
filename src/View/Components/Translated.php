<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

class Translated extends Component
{
    public $languages;

    public function __construct($languages)
    {
        $this->languages = $languages;
    }

    public function render()
    {
        return view('blade-components::components.translated');
    }
}
