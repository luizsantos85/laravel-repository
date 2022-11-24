<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\User;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class EloquentUserRepository extends BaseEloquentRepository implements UserRepositoryInterface
{
    public function entity()
    {
        return User::class;
    }

    public function search(array $data, $totalPage = 10)
    {
       return $this->entity
            ->where(function ($query) use ($data) {
                if (isset($data['name'])) {
                    $filter = $data['name'];
                    $query->where(function ($subQuery) use ($filter) {
                        $subQuery->where('name', 'LIKE', "%{$filter}%");
                    });
                }
                if (isset($data['email'])) {
                    $filter = $data['email'];
                    $query->where(function ($subQuery) use ($filter) {
                        $subQuery->where('email', 'LIKE', "%{$filter}%");
                    });
                }

            })->paginate($totalPage);
    }
}