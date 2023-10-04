<?php

namespace App\Repositories;

use App\Models\Employee;

final class EmployeeRepository extends BaseRepository
{
    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->model->with(['office_detail', 'position_detail'])
            ->orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->get();
    }
}
