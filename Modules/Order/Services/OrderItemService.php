<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Order\Models\OrderItem;

class OrderItemService
{

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    private function buildQuery(): Builder
    {

        $query = OrderItem::query();

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

    public function find(int $id): ?OrderItem
    {

        return OrderItem::find($id);
    }

    public function create(array $data): OrderItem
    {

        $orderItem = new OrderItem();
        $orderItem->fill($data);
        $orderItem->save();

        return $orderItem;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, OrderItem $orderItem): OrderItem
    {

        $orderItem->fill($data);
        $orderItem->save();

        return $orderItem;
    }

    public function delete(OrderItem $orderItem): ?bool
    {

        return $orderItem->delete();
    }

    public function listOfChoices(): array
    {

        return OrderItem::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
