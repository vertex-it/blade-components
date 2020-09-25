<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $title;
    public $content;
    public $wide;

    public function __construct($id, $title, $content = null, bool $wide = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->wide = $wide;
    }

    public function labelId()
    {
        return Str::random();
    }

    public function render()
    {
        return view('blade-components::components.modal');
    }
}
