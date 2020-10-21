<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\Support\Str;
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
    public $id;

    // FIX: Implement columns in all components
    // IDEA: Maybe we don't need all properties mapped, for example 'columns'
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
        $this->id = Str::random(6);
    }

    abstract public function render();

    public function getId()
    {
        $name = str_replace(['[', ']'], ['_', ''], $this->name);

        return 'bc_' . $name . '_' . $this->id;
    }

    public function getLabel()
    {
        return $this->label ?? $this->getNameAsTitle();
    }

    public function getEscapedName()
    {
        return str_replace(['[', ']'], ['_', ''], $this->name);
    }

    public function getNameAsTitle()
    {
        return ucfirst(str_replace('_', ' ', $this->getEscapedName()));
    }

    public function getPlaceholder()
    {
        if (config('blade_components.show_placeholder')) {
            return $this->placeholder ?? implode(' ', [
                __('blade-components::components.placeholder_prefix'),
                strtolower($this->getLabel())
            ]);
        }

        return '';
    }

    public function outputRequired()
    {
        return $this->required ? ' required ' : '';
    }
}
