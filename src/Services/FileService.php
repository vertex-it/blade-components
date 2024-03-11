<?php

namespace VertexIT\BladeComponents\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class FileService
{
    public function store(UploadedFile $file, array | string $path, string $name = ''): array | string
    {
        $this->makeDirectory($path);

        return $file->storeAs($path, $this->getFileNameWithExtension($file, $name));
    }

    public static function delete(array | string $paths): bool
    {
        return Storage::delete($paths);
    }

    protected function makeDirectory(string $path): void
    {
        if (Storage::exists($path)) {
            return;
        }

        if (
            ! mkdir($currentDirectory = Storage::path($path), 0755, true)
            && ! is_dir($currentDirectory)
        ) {
            throw new RuntimeException("Directory $path was not created.");
        }
    }

    protected function getFileNameWithExtension(UploadedFile $file, string $name): string
    {
        return $name === ''
            ? $file->hashName()
            : $name;
    }
}
