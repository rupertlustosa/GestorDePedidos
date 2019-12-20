<?php

declare(strict_types=1);

namespace Modules\Product\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Product\Models\Category;

class CategoryService
{

    private function buildQuery(): Builder
    {

        $query = Category::query();

        $query->when(request('id'), function ($query, $id) {

            return $query->whereId($id);
        });

        $query->when(request('name'), function ($query, $search) {

            return $query->where('name', 'LIKE', '%' . $search . '%');
        });

        return $query;
    }

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    public function all(): Collection
    {

        return $this->buildQuery()->get();
    }

    public function find(int $id): ?Category
    {

        return Category::find($id);
    }

    public function create(array $data): Category
    {

        $category = new Category();
        $category->fill($data);
        $category->save();

        return $category;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, Category $category): Category
    {

        $category->fill($data);
        $category->save();

        return $category;
    }

    public function delete(Category $category): ?bool
    {

        return $category->delete();
    }

    public function lists(): array
    {

        return Category::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
