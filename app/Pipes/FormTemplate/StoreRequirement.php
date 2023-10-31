<?php

namespace App\Pipes\FormTemplate;

use App\Models\Requirement;
use App\Pipes\BasePipeHandler;
use Closure;

final class StoreRequirement extends BasePipeHandler
{
    public function __construct()
    {
    }

    public function handle(array $payload, Closure $next)
    {
        $model = null;

        if (request()->method() === 'POST') {
            $requirementDescriptions = $payload['requirements'] ?? [];
            $model = $payload['document'];
        } else {
            $requirementDescriptions = $payload['form']['requirements'] ?? [];
            $payload['model']->requirements()->delete();
            $model = $payload['model'];
        }

        if (! empty($requirementDescriptions)) {
            foreach ($requirementDescriptions as $description) {
                $requirement = new Requirement(['description' => $description]);
                $model->requirements()->save($requirement);
            }
        }

        return $next($payload);
    }
}
