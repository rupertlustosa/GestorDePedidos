<?php

declare(strict_types=1);

namespace Modules\User\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\User;

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

        return $query->orderByDesc('id');
    }

    public function all(): Collection
    {

        return $this->buildQuery()->get();
    }

    public function find(int $id): ?User
    {

        //return Cache::remember('User_find_' . $id, config('cache.cache_time'), function () use ($id) {
        return User::find($id);
        //});
    }

    public function create(array $data): User
    {

        return DB::transaction(function () use ($data) {

            $user = new User();
            $user->fill($data);
            $user->save();

            return $user;
        });
    }

    public function update(array $data, User $user): User
    {

        $user->fill($data);
        $user->save();

        return $user;
    }

    public function delete(User $user): ?bool
    {
        //$user->user_eraser_id = \Auth::id();
        //$user->save();

        return $user->delete();
    }

    public function lists(): array
    {
        //return Cache::remember('User_lists', config('cache.cache_time'), function () {

        return User::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
        //});
    }
}
