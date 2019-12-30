<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Order\Models\OrderType;

class OrderTypeService
{

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    private function buildQuery(): Builder
    {

        $query = OrderType::query();

        $query->when(request('id'), function ($query, $id) {

            return $query->whereId($id);
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

        return OrderType::select('id', 'name as label')
            ->orderBy('name')
            ->get()
            ->toArray();
    }
}
