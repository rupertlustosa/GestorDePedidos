<?php

declare(strict_types=1);

namespace Modules\Product\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductVariation;

class ProductService
{

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    private function buildQuery(): Builder
    {

        $query = Product::query();

        $query->when(request('category_id'), function ($query, $category_id) {

            return $query->whereCategoryId($category_id);
        });

        $query->when(request('name'), function ($query, $search) {

            return $query->where('name', 'LIKE', '%' . $search . '%');
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

        return DB::transaction(function () use ($data) {

            $product = new Product();
            $product->fill($data);
            $product->save();

            foreach ($data['variations'] as $variation) {

                $variation['product_id'] = $product->id;

                ProductVariation::create($variation);
            }

            return $product;
        });
    }

    public function update(array $data, Product $product): Product
    {

        $formVariations = collect($data['variations']);
        $oldIdVariations = $product->variations()->pluck('id')->toArray();
        $newIdVariations = $formVariations->pluck('id')->toArray();

        $product->fill($data);
        $product->save();

        $exclude = array_diff($oldIdVariations, $newIdVariations);

        ProductVariation::whereIn('id', $exclude)->delete();

        foreach ($data['variations'] as $variation) {

            if (empty($variation['id'])) {

                $variation['product_id'] = $product->id;
                ProductVariation::create($variation);
            } else {

                ProductVariation::find($variation['id'])
                    ->update($variation);
            }
        }

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
