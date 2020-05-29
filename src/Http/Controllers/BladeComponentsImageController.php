<?php

namespace VertexIt\BladeComponents\Http\Controllers;

use Illuminate\Http\Request;
use VertexIt\BladeComponents\Services\FileService;

class BladeComponentsImageController extends Controller
{
    /**
     * @var FileService
     */
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function store(Request $request)
    {
        $image = $this->fileService->upload(
            $request->image,
            'temp',
            $request->name
        );

        return response()->json(
            config('app.url') . '/' . str_replace('public', 'storage', $image)
        );
    }
}
