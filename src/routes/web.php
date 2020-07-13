<?php

use Illuminate\Support\Facades\Route;
use VertexIT\BladeComponents\Http\Controllers\BladeComponentsImageController;

Route::post('blade-components/images', [
    BladeComponentsImageController::class,
    'store',
])->name('blade-components.images');
