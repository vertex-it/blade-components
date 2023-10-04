<?php

namespace VertexIT\BladeComponents\Services;

use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use RuntimeException;

class FileService
{
    public function upload(UploadedFile $file, array | string $path, string $name = ''): array | string
    {
        try {
            return $this->processUpload($file, $path, $name);
        } catch (Exception $e) {
            report($e);

            return '';
        }
    }

    protected function processUpload(array | UploadedFile $file, string $path, string $name): array | string
    {
        $this->makeDirectory($path);

        if (is_array($file)) {
            return $this->processMultipleFileUploads($path, $file, $name);
        }

        return $this->processSingleFileUpload($path, $file, $name);
    }

    protected function processSingleFileUpload(string $path, UploadedFile $file, string $name): string
    {
        return $file->storeAs($path, $this->getFileNameWithExtension($file, $name));
    }

    protected function processMultipleFileUploads(string $path, array $files, string $name): array
    {
        $uploadedFiles = [];

        foreach ($files as $file) {
            $uploadedFiles[] = $this->processSingleFileUpload($path, $file, $name);
        }

        return $uploadedFiles;
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

    public static function delete(array | string $paths): bool
    {
        return Storage::delete($paths);
    }
}
