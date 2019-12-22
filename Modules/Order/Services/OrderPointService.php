<?php

declare(strict_types=1);

namespace Modules\Order\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Order\Models\OrderPoint;

class OrderPointService
{

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    private function buildQuery(): Builder
    {

        $query = OrderPoint::query();

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

    public function find(int $id): ?OrderPoint
    {

        return OrderPoint::find($id);
    }

    public function create(array $data): OrderPoint
    {

        $orderPoint = new OrderPoint();
        $orderPoint->fill($data);
        $orderPoint->save();

        return $orderPoint;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, OrderPoint $orderPoint): OrderPoint
    {

        $orderPoint->fill($data);
        $orderPoint->save();

        return $orderPoint;
    }

    public function delete(OrderPoint $orderPoint): ?bool
    {

        return $orderPoint->delete();
    }

    public function listOfChoices(): array
    {

        return OrderPoint::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
