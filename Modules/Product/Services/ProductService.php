<?php

declare(strict_types=1);

namespace Modules\Product\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Product\Models\Product;

class ProductService
{

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    private function buildQuery(): Builder
    {

        $query = Product::query();

        $query->when(request('id'), function ($query, $id) {

            return $query->whereId($id);
        });

        $query->when(request('search'), function ($query, $search) {

            return $query->where('id', 'LIKE', '%' . $search . '%');
        });

        return $query;
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

    public function listOfChoices(): array
    {

        return Product::select('id', 'name as label')
            ->orderBy('name')
            ->get()
            ->toArray();

    }
}
