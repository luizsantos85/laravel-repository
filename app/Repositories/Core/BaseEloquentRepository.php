<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\NotEntityDefined;

class BaseEloquentRepository implements RepositoryInterface
{
    protected $entity;

    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }

    public function getAll()
    {
        return $this->entity->get();
    }

    public function findById(int $id)
    {
        return $this->entity->find($id);
    }

    public function findWhere(string $column, string $value)
    {
        return $this->entity->where($column, $value)->get();
    }

    public function findWhereFirst(string $column, string $value)
    {
        return $this->entity->where($column, $value)->first();
    }

    public function paginate(int $totalPage = 10)
    {
        return $this->entity->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(int $id, array $data)
    {
        $entity = $this->findById($id);
        return $entity->update($data);
    }

    public function destroy(int $id)
    {
        return $this->findById($id)->delete();
    }


    public function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NotEntityDefined;
        }
        return app($this->entity());
    }
}
