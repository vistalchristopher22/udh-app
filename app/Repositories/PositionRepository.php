<?php

namespace App\Repositories;

use App\Models\Position;

final class PositionRepository extends BaseRepository
{
    public function __construct(Position $model)
    {
        parent::__construct($model);
    }
}
