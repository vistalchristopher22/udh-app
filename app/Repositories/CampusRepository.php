<?php

namespace App\Repositories;

use App\Models\Campus;

final class CampusRepository extends BaseRepository
{
    public function __construct(Campus $model)
    {
        parent::__construct($model);
    }
}
