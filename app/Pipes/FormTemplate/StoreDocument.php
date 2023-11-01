<?php

namespace App\Pipes\FormTemplate;

use App\Pipes\BasePipeHandler;
use App\Repositories\DocumentRepository;
use Closure;

final class StoreDocument extends BasePipeHandler
{
    public function __construct(private readonly DocumentRepository $repository)
    {
    }

    public function handle(array $payload, Closure $next)
    {
        $document = $this->repository->create([
            'name' => $payload['name'],
            'description' => $payload['description'],
            'access_level' => $payload['access_level'],
            'office_responsible' => $payload['office'],
            'uploaded_by' => auth()->user()->information->employee_id,
            'uploaded_at' => $payload['uploaded_at'],
            'file_content' => '',
            'file_path' => $payload['file_path'],
            'size' => $payload['file_size'],
            'file_type' => $payload['file_type'],
            'version' => $payload['version'],
            'category_id' => $payload['category_id'],
            'fiscal_year' => $payload['fiscal_year'],
        ]);

        $payload['document'] = $document;

        return $next($payload);
    }
}
