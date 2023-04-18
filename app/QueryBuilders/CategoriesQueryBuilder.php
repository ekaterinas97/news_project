<?php

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;
    public function __construct()
    {
        $this->model = Category::query();
    }
    public function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getCategoriesWithPagination(int $quantity = 8): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
