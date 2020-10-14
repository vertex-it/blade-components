<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class WorkTimeDay extends BaseInputComponent
{
    public $workDay;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = null,
        $comment = null,
        $inline = null,
        $workDay = null
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->workDay = $workDay;
    }

    public function render()
    {
        return view('blade-components::components.inputs.work-time-day');
    }
}
