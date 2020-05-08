<?php

namespace VertexIt\BladeComponents;

use Illuminate\Support\Facades\Facade;

/**
 * @see \VertexIt\BladeComponents\Skeleton\SkeletonClass
 */
class BladeComponentsFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'blade-components';
    }
}
