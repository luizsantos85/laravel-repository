<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Product;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

class EloquentProductRepository extends BaseEloquentRepository implements ProductRepositoryInterface
{
    public function entity()
    {
        return Product::class;
    }

    public function search(array $data, $totalPage = 10)
    {
       return $this->entity
            // ->with('category')
            ->where(function ($query) use ($data) {
                if (isset($data['name'])) {
                    $filter = $data['name'];
                    $query->where(function ($subQuery) use ($filter) {
                        $subQuery->where('name', 'LIKE', "%{$filter}%");
                    });
                }
                if (isset($data['price'])) {
                    //fazer filtro para buscar valores entre os numeros
                    $query->where('price', $data['price']);
                }
                if (isset($data['category'])) {
                    $query->where('category_id', $data['category']);
                }
            })->paginate($totalPage);
    }
}