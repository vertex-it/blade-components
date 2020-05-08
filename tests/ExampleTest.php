<?php

namespace VertexIt\BladeComponents\Tests;

use Orchestra\Testbench\TestCase;
use VertexIt\BladeComponents\BladeComponentsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [BladeComponentsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
