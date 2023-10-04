<?php

namespace App\Services;

use App\Contracts\IUploadHandler;
use Exception;
use Illuminate\Http\UploadedFile;

class FileUploadService implements IUploadHandler
{
    public const DEFAULT_VERSION = '1.0';

    /**
     * @throws Exception
     */
    public function handle(UploadedFile $file, string $directory): array
    {

        if (! is_dir($directory)) {
            throw new Exception('Directory does not exist');
        }

        $stat = $file->move($directory, $file->getClientOriginalName());

        return [
            'uploaded_at' => now(),
            'file_path' => $directory.DIRECTORY_SEPARATOR.$file->getClientOriginalName(),
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $stat->getSize(),
            'file_type' => $stat->getExtension(),
            'version' => self::DEFAULT_VERSION,
        ];
    }
}
