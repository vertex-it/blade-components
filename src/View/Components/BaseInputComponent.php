<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\View\Component;

abstract class BaseInputComponent extends Component
{
    public $name;
    public $label;
    public $placeholder;
    public $value;
    public $required;
    public $comment;
    public $inline;

    /**
     * Class constructor.
     */
    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $value = null,
        $required = null,
        $comment = null,
        $inline = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->required = $required;
        $this->comment = $comment;
        $this->inline = $inline;
    }

    abstract public function render();

    public function getLabel()
    {
        return $this->label ?? $this->getNameAsTitle();
    }

    public function getNameAsTitle()
    {
        return ucfirst(str_replace('_', ' ', $this->name));
    }

    public function getPlaceholder()
    {
        return $this->placeholder ?? implode(' ', [
            __('blade-components::components.placeholder_prefix'),
            strtolower($this->getLabel())
        ]);
    }

    public function outputRequired()
    {
        $this->required ? ' required ' : '';
    }
}
