<?php

declare(strict_types=1);

namespace Modules\Product\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Product\Models\Product;

class ProductService
{

    private function buildQuery(): Builder
    {

        $query = Product::query();

        $query->when(request('id'), function ($query, $id) {

            return $query->whereId($id);
        });

        $query->when(request('name'), function ($query, $search) {

            return $query->where('name', 'LIKE', '%' . $search . '%');
        });

        $query->when(request('summary'), function ($query, $search) {

            return $query->where('summary', 'LIKE', '%' . $search . '%');
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

    public function find(int $id): ?Product
    {

        return Product::find($id);
    }

    public function create(array $data): Product
    {

        $product = new Product();
        $product->fill($data);
        $product->save();

        return $product;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, Product $product): Product
    {

        $product->fill($data);
        $product->save();

        return $product;
    }

    public function delete(Product $product): ?bool
    {

        return $product->delete();
    }

    public function lists(): array
    {

        return Product::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
