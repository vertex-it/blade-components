<?php

namespace VertexIT\BladeComponents\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Breadcrumb extends Component {

    public $modelValue;
    public $modelName;
    public $parentName;
    public $parentTitleColumn;
    public $routes;

    public function __construct($model = null, $parent = null)
    {
        $this->modelValue = $model;
        $this->modelName = class_basename($model);
        $this->parentName = is_array($parent) ? array_key_first($parent) : null;
        $this->parentTitleColumn = is_array($parent) ? reset($parent) : null;
        $this->routes = [];
    }

    // TSC: Probably wont work for model names like BlogCategory, etc.
    private function addPreparedRoute($modelName, $route = 'index', $routeModel = null, $routeModelName = null)
    {
        $modelPluralName = Str::of($modelName)->lower()->plural();

        $route = implode('.', ['admin', $modelPluralName, $route]);

        array_push($this->routes, [
            'url' => route($route, $routeModel),
            'name' => $routeModelName ?? ucfirst($modelPluralName)
        ]);
    }

    private function prepareParentData()
    {
        $parentRelationName = Str::of($this->parentName)->lower();

        $model = $this->modelValue->{$parentRelationName};
        $modelName = $model->{$this->parentTitleColumn};

        return [$model, $modelName];
    }

    public function render()
    {
        if ($this->parentName) {
            $this->addPreparedRoute($this->parentName);

            list($parentValue, $parentTitle) = $this->prepareParentData();

            $this->addPreparedRoute(
                $this->parentName,
                'edit',
                // TODO: Add...
            );
        }

        if ($this->modelName) {
            $this->addPreparedRoute($this->modelName);
        }

        return view('blade-components::components.breadcrumb');
    }
}