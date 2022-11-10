<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url', 'description', 'price','category_id'];

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope('orderByPrice',function(Builder $builder){
            $builder->orderBy('price','desc');
        });
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
