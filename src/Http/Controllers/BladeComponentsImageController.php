<?php

namespace VertexIT\BladeComponents\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use VertexIT\BladeComponents\Services\FileService;

class BladeComponentsImageController extends Controller
{

    public function __construct(
        protected FileService $fileService
    ) {
    }

    public function store(Request $request): JsonResponse
    {
        $image = $this->fileService->upload($request->image, 'temp', $request->name ?? '');

        return response()->json(Storage::url($image));
    }
}
