<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll();
    public function findById(int $id);
    public function findWhere(string $column, string $value);
    public function findWhereFirst(string $column, string $value);
    public function paginate(int $totalPage = 10);
    public function store(array $data);
    public function update(int $id, array $data);
    public function destroy(int $id);
    public function orderBy($column, $order = "DESC");
}
