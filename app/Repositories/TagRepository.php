<?php

namespace App\Repositories;

use App\Models\Tag;

final class TagRepository extends BaseRepository
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
}
