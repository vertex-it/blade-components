<?php

namespace VertexIT\BladeComponents\View\Components\Inputs;

use VertexIT\BladeComponents\View\Components\BaseInputComponent;

class WorkTime extends BaseInputComponent
{
    public $preparedValue;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = false,
        $comment = null,
        $inline = null
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        $this->preparedValue = $this->getPreparedValue($value);
    }

    public function getPreparedValue($value)
    {
        $old = request()->old($this->name);

        if (isset($old['monday'])) {
            return array_map(function ($day) {
                return prepareMultipleInputData($day);
            }, $old);
        }

        if (isset($value['monday'])) {
            return $value;
        }

        return [
            'monday' => [],
            'tuesday' => [],
            'wednesday' => [],
            'thursday' => [],
            'friday' => [],
            'saturday' => [],
            'sunday' => [],
        ];
    }

    public function render()
    {
        return view('blade-components::components.inputs.work-time');
    }
}
