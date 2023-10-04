<?php

namespace App\Repositories;

use App\Contracts\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements IBaseRepository
{
    public function __construct(protected Model $model)
    {
    }

    public function get()
    {
        return $this->model->orderBy('created_at', 'DESC')
            ->orderBy('updated_at', 'DESC')
            ->get();
    }

    public function create(array $data): mixed
    {
        return $this->model->create($data);
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

    public function find(int|string $id)
    {
        return $this->model->find($id);
    }

    public function update(int|string $id, array $data): void
    {
        $this->find($id)->update($data);
    }
}
