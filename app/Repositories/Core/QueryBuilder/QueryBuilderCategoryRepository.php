<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Core\BaseQueryBuilderRepository;
use Illuminate\Support\Str;

class QueryBuilderCategoryRepository extends BaseQueryBuilderRepository implements CategoryRepositoryInterface
{
    protected $table = 'categories';

    public function search(array $data, $totalPage = 10)
    {
        return $this->db->table($this->tb)->where(function ($query) use ($data) {
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

    public function productsByCategoryId($id)
    {
        return $this->db->table('products')->where('category_id',$id)->get();
    }

}
