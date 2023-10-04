<?php

namespace App\Pipes\FormTemplate;

use App\Pipes\BasePipeHandler;
use App\Repositories\DocumentRepository;
use Closure;

final class UpdateDocument extends BasePipeHandler
{
    public function __construct(private readonly DocumentRepository $repository)
    {
    }

    public function handle(array $payload, Closure $next)
    {
        if (array_key_exists('uploaded_at', $payload) && $payload['uploaded_at']) {
            $payload['model']->update([
                'name' => $payload['form']['name'],
                'description' => $payload['form']['description'],
                'access_level' => $payload['form']['access_level'],
                'office_responsible' => $payload['form']['office'],
                'uploaded_at' => $payload['uploaded_at'],
                'file_path' => $payload['file_path'],
                'size' => $payload['file_size'],
                'file_type' => $payload['file_type'],
                'version' => $payload['version'],
                'file_content' => '',
            ]);
        } else {
            $payload['model']->update([
                'name' => $payload['form']['name'],
                'description' => $payload['form']['description'],
                'access_level' => $payload['form']['access_level'],
                'office_responsible' => $payload['form']['office'],
            ]);
        }

        return $next($payload);
    }
}
