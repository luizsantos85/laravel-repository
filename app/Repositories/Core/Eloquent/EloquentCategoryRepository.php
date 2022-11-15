<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;

class EloquentCategoryRepository extends BaseEloquentRepository implements CategoryRepositoryInterface
{
    public function entity()
    {
        return Category::class;
    }

    public function search(array $data, $totalPage = 10)
    {
        return $this->entity
            ->where(function ($query) use ($data) {
                if (isset($data['title'])) {
                    $query->where('title', 'LIKE', "%{$data['title']}%");
                }
                if (isset($data['url'])) {
                    $query->orWhere('url', 'LIKE', "%{$data['url']}%");
                }
            })
            ->orderBy('id', 'desc')
            ->paginate($totalPage);
    }
}