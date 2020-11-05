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
        $required = null,
        $comment = null,
        $inline = null
    ) {
        parent::__construct($name, $label, $placeholder, $value, $required, $comment, $inline);

        // dd($this->getPreparedValue($value));
        $this->preparedValue = $this->getPreparedValue($value);
    }

    public function getPreparedValue($value)
    {
        $old = request()->old($this->name);

    if (isset($old['monday'])) {
            $this->preparedValue = prepareMultipleInputData(request()->old($this->name));
        } else if (isset($value['monday'])) {
            return $value;
        } else {
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
    }

    public function render()
    {
        return view('blade-components::components.inputs.work-time');
    }
}
