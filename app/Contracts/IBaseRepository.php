<?php

namespace App\Contracts;

interface IBaseRepository
{
    public function get();

    public function find(int $id);

    public function create(array $data): mixed;

    public function update(int|string $id, array $data);

    public function delete(int $id);
}
