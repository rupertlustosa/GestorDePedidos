<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Order\Models\OrderType;

class OrderTypeService
{

    private function buildQuery(): Builder
    {

        $query = OrderType::query();

        $query->when(request('id'), function ($query, $id) {

            return $query->whereId($id);
        });

        $query->when(request('search'), function ($query, $search) {

            return $query->where('id', 'LIKE', '%' . $search . '%');
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

    public function find(int $id): ?OrderType
    {

        return OrderType::find($id);
    }

    public function create(array $data): OrderType
    {

        $orderType = new OrderType();
        $orderType->fill($data);
        $orderType->save();

        return $orderType;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, OrderType $orderType): OrderType
    {

        $orderType->fill($data);
        $orderType->save();

        return $orderType;
    }

    public function delete(OrderType $orderType): ?bool
    {

        return $orderType->delete();
    }

    public function listOfChoices(): array
    {

        return OrderType::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
