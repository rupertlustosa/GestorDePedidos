<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Order\Models\Order;

class OrderService
{

    private function buildQuery(): Builder
    {

        $query = Order::query();

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

    public function find(int $id): ?Order
    {

        return Order::find($id);
    }

    public function create(array $data): Order
    {

        $order = new Order();
        $order->fill($data);
        $order->save();

        return $order;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, Order $order): Order
    {

        $order->fill($data);
        $order->save();

        return $order;
    }

    public function delete(Order $order): ?bool
    {

        return $order->delete();
    }

    public function listOfChoices(): array
    {

        return Order::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
