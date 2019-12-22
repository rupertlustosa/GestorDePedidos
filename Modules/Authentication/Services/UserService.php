<?php

declare(strict_types=1);

namespace Modules\Authentication\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Authentication\Models\User;

class UserService
{

    public function paginate(int $limit): LengthAwarePaginator
    {

        return $this->buildQuery()->paginate($limit);
    }

    private function buildQuery(): Builder
    {

        $query = User::query();

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

    public function find(int $id): ?User
    {

        return User::find($id);
    }

    public function create(array $data): User
    {

        $user = new User();
        $user->fill($data);
        $user->save();

        return $user;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, User $user): User
    {

        $user->fill($data);
        $user->save();

        return $user;
    }

    public function delete(User $user): ?bool
    {

        return $user->delete();
    }

    public function listOfChoices(): array
    {

        return User::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
