<?php

namespace App\Contracts;

use Illuminate\Http\UploadedFile;

interface IUploadHandler
{
    public function handle(UploadedFile $file, string $directory): array;
}
