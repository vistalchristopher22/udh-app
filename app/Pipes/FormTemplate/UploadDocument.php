<?php

namespace App\Pipes\FormTemplate;

use App\Pipes\BasePipeHandler;
use App\Services\FileUploadService;
use Closure;
use Error;
use Exception;
use Illuminate\Support\Facades\Storage;

final class UploadDocument extends BasePipeHandler
{
    /**
     * @return mixed
     */
    public function handle(array $payload, Closure $next)
    {
        if (request()->method() == 'PUT') {
            if (isset($payload['form']['file'])) {
                try {
                    $fileInformation = (new FileUploadService())->handle($payload['form']['file'], Storage::disk('public')->path('forms'));
                    $payload = array_merge($payload, $fileInformation);

                    return $next($payload);
                } catch (Exception $e) {
                    throw new Error($e->getMessage());
                }
            }

            return $next($payload);
        } else {
            try {
                $fileInformation = (new FileUploadService())->handle($payload['file'], Storage::disk('public')->path('forms'));
                $payload = array_merge($payload, $fileInformation);

                return $next($payload);
            } catch (Exception $e) {
                throw new Error($e->getMessage());
            }
        }
    }
}
