<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Order\Models\OrderStatus;

class OrderStatusService
{

    private function buildQuery(): Builder
    {

        $query = OrderStatus::query();

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

    public function find(int $id): ?OrderStatus
    {

        return OrderStatus::find($id);
    }

    public function create(array $data): OrderStatus
    {

        $orderStatus = new OrderStatus();
        $orderStatus->fill($data);
        $orderStatus->save();

        return $orderStatus;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, OrderStatus $orderStatus): OrderStatus
    {

        $orderStatus->fill($data);
        $orderStatus->save();

        return $orderStatus;
    }

    public function delete(OrderStatus $orderStatus): ?bool
    {

        return $orderStatus->delete();
    }

    public function listOfChoices(): array
    {

        return OrderStatus::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
