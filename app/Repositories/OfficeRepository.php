<?php

namespace App\Repositories;

use App\Models\Office;

final class OfficeRepository extends BaseRepository
{
    public function __construct(Office $model)
    {
        parent::__construct($model);
    }
}
