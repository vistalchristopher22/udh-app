<?php

namespace App\Pipes\Tags;

use App\Pipes\BasePipeHandler;
use App\Repositories\TagRepository;
use Closure;

final class ParseTags extends BasePipeHandler
{
    public function __construct(private readonly TagRepository $tagRepository)
    {
    }

    public function handle(array $payload, Closure $next)
    {

        if (request()->method() === 'PUT') {
            $payload['model']->tags()->detach();
            $payload['model']->tags()->attach($payload['form']['tags']);
        } else {
            $tags = $payload['tags'];
            $payload['document']->tags()->attach($payload['tags']);
        }

        return $next($payload);
    }
}
