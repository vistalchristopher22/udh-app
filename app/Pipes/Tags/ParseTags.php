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
            $tags = array_unique(explode(',', $payload['form']['tags']));
            $payload['form']['tags'] = [];
            foreach ($tags as $tag) {
                $payload['tags'][] = $this->tagRepository->create(['name' => $tag])?->id;
            }
            $payload['model']->tags()->attach($payload['tags']);
        } else {
            $tags = array_unique(explode(',', $payload['tags']));
            $payload['tags'] = [];
            foreach ($tags as $tag) {
                $payload['tags'][] = $this->tagRepository->create(['name' => $tag])?->id;
            }
            $payload['document']->tags()->attach($payload['tags']);
        }

        return $next($payload);
    }
}
