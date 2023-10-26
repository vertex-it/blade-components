<?php

namespace VertexIT\BladeComponents;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use VertexIT\BladeComponents\View\Components\Breadcrumb;
use VertexIT\BladeComponents\View\Components\Form;
use VertexIT\BladeComponents\View\Components\Inputs\Checkbox;
use VertexIT\BladeComponents\View\Components\Inputs\Cropper;
use VertexIT\BladeComponents\View\Components\Inputs\Date;
use VertexIT\BladeComponents\View\Components\Inputs\File;
use VertexIT\BladeComponents\View\Components\Inputs\Input;
use VertexIT\BladeComponents\View\Components\Inputs\Radio;
use VertexIT\BladeComponents\View\Components\Inputs\Select;
use VertexIT\BladeComponents\View\Components\Inputs\Textarea;
use VertexIT\BladeComponents\View\Components\Inputs\Time;
use VertexIT\BladeComponents\View\Components\Inputs\Toggle;
use VertexIT\BladeComponents\View\Components\Inputs\Uppy;
use VertexIT\BladeComponents\View\Components\Inputs\WorkTime;
use VertexIT\BladeComponents\View\Components\Inputs\WorkTimeDay;
use VertexIT\BladeComponents\View\Components\Modal;
use VertexIT\BladeComponents\View\Components\ModalButton;
use VertexIT\BladeComponents\View\Components\Multiple;
use VertexIT\BladeComponents\View\Components\MultipleRow;
use VertexIT\BladeComponents\View\Components\Translated;

class BladeComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'blade-components');

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'blade-components');

        $this->registerBladeComponents();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/blade_components.php' => config_path('blade_components.php'),
            ], 'blade-components-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/blade-components'),
            ], 'blade-components-views');

            $this->publishes([
                __DIR__ . '/../resources/js/blade-components.js' => resource_path('js/vendor/blade-components.js'),
                __DIR__ . '/../resources/css/blade-components.css' => resource_path('css/vendor/blade-components.css'),
            ], 'blade-components-assets');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/blade_components.php', 'blade_components');
    }

    private function registerBladeComponents()
    {
        Blade::componentNamespace('VertexIT\\BladeComponents\\View\\Components', 'blade-components');

        Blade::component('breadcrumb', Breadcrumb::class);
        Blade::component('form', Form::class);
        Blade::component('modal-button', ModalButton::class);
        Blade::component('modal', Modal::class);
        Blade::component('multiple', Multiple::class);
        Blade::component('multiple-row', MultipleRow::class);
        Blade::component('translated', Translated::class);
        Blade::component('inputs.checkbox', Checkbox::class);
        Blade::component('inputs.cropper', Cropper::class);
        Blade::component('inputs.date', Date::class);
        Blade::component('inputs.file', File::class);
        Blade::component('inputs.input', Input::class);
        // Blade::component('inputs.multi-input', MultiInput::class);
        Blade::component('inputs.radio', Radio::class);
        Blade::component('inputs.select', Select::class);
        Blade::component('inputs.textarea', Textarea::class);
        Blade::component('inputs.time', Time::class);
        Blade::component('inputs.toggle', Toggle::class);
        Blade::component('inputs.uppy', Uppy::class);
        Blade::component('inputs.work-time', WorkTime::class);
        Blade::component('inputs.work-time-day', WorkTimeDay::class);
    }
}
