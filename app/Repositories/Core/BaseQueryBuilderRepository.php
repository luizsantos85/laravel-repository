<?php

namespace App\Repositories\Core;

// use DB;
use Illuminate\Database\DatabaseManager as DB;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\PropertyTableNotExists;

class BaseQueryBuilderRepository implements RepositoryInterface
{
    protected $tb, $db;
    protected $orderBy = ['column' => 'id', 'order' => 'desc'];

    public function __construct(DB $db)
    {
        $this->tb = $this->resolveTable();
        $this->db = $db;
    }

    public function getAll()
    {
        return $this->db
            ->table($this->tb)
            ->orderBy($this->orderBy['column'], $this->orderBy['order'])
            ->get();
    }

    public function findById(int $id)
    {
        return $this->db->table($this->tb)->find($id);
    }

    public function findWhere(string $column, string $value)
    {
        return $this->db->table($this->tb)->where($column, $value)->get();

    }

    public function findWhereFirst(string $column, string $value)
    {
        return $this->db->table($this->tb)->where($column, $value)->first();
    }

    public function paginate(int $totalPage = 10)
    {
        return $this->db
                ->table($this->tb)
                ->orderBy($this->orderBy['column'], $this->orderBy['order'])
                ->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->db->table($this->tb)->insert($data);
    }

    public function update(int $id, array $data)
    {
        // $category = $this->findById($id);
        // return $category->update($data);

        return $this->db->table($this->tb)->where('id', $id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->db->table($this->tb)->where('id', $id)->delete();
    }

    public function orderBy($column, $order = "DESC")
    {
        $this->orderBy['column'] = $column;
        $this->orderBy['order'] = $order;
        return $this;
    }


    public function resolveTable()
    {
        if(!property_exists($this, 'table')){
            throw new PropertyTableNotExists;
        }
        return $this->table;
    }

}