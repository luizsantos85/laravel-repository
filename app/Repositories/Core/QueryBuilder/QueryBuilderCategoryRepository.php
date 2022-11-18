<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Core\BaseQueryBuilderRepository;
use Illuminate\Support\Str;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    protected $table = 'categories';

    public function search(array $data)
    {
    }

    public function store(array $data)
    {
        $data['url'] = Str::of($data['title'])->kebab();
        return $this->db->table($this->tb)->insert($data);
    }

    public function update(int $id, array $data)
    {
        $data['url'] = Str::of($data['title'])->kebab();
        return $this->db->table($this->tb)->where('id', $id)->update($data);
    }
}
