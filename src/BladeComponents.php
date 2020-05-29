<?php

namespace VertexIt\BladeComponents;

use VertexIt\BladeComponents\View\Components\Forms\Checkbox;
use VertexIt\BladeComponents\View\Components\Forms\Date;
use VertexIt\BladeComponents\View\Components\Forms\File;
use VertexIt\BladeComponents\View\Components\Forms\Form;
use VertexIt\BladeComponents\View\Components\Forms\FormSwitch;
use VertexIt\BladeComponents\View\Components\Forms\ImageCropper;
use VertexIt\BladeComponents\View\Components\Forms\Input;
use VertexIt\BladeComponents\View\Components\Forms\MultiInput;
use VertexIt\BladeComponents\View\Components\Forms\Radio;
use VertexIt\BladeComponents\View\Components\Forms\Select;
use VertexIt\BladeComponents\View\Components\Forms\Textarea;
use VertexIt\BladeComponents\View\Components\Forms\Time;
use VertexIt\BladeComponents\View\Components\Forms\Uppy;
use Illuminate\Support\Facades\Blade;

class BladeComponents
{
    public function register()
    {
        Blade::component('forms.checkbox', Checkbox::class);
        Blade::component('forms.date', Date::class);
        Blade::component('forms.file', File::class);
        Blade::component('forms.form', Form::class);
        Blade::component('forms.form-switch', FormSwitch::class);
        Blade::component('forms.image-cropper', ImageCropper::class);
        Blade::component('forms.input', Input::class);
        Blade::component('forms.multi-input', MultiInput::class);
        Blade::component('forms.radio', Radio::class);
        Blade::component('forms.select', Select::class);
        Blade::component('forms.textarea', Textarea::class);
        Blade::component('forms.time', Time::class);
        Blade::component('forms.uppy', Uppy::class);
    }
}
