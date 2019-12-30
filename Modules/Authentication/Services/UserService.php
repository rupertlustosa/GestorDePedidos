<?php

declare(strict_types=1);

namespace Modules\Authentication\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Modules\Authentication\Models\Role;
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

        $query->when(request('name'), function ($query, $search) {

            return $query->where('name', 'LIKE', '%' . $search . '%');
        });

        $query->when(request('email'), function ($query, $search) {

            return $query->where('email', 'LIKE', '%' . $search . '%');
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

        CacheService::clearUsers();

        return DB::transaction(function () use ($data) {

            $user = new User();
            $user->fill($data);
            $user->password = bcrypt($data['password']);
            $user->save();

            $user->roles()->sync($data['roles']);

            return $user;
        });
    }

    public function update(array $data, User $user): User
    {

        CacheService::clearUsers();

        return DB::transaction(function () use ($data, $user) {

            $user->fill($data);
            $user->save();

            $user->roles()->sync($data['roles']);
            return $user;
        });
    }

    public function delete(User $user): ?bool
    {

        return $user->delete();
    }

    public function listOfChoices(): array
    {

        return User::select('id', 'name as label')
            ->orderBy('name')
            ->get()
            ->toArray();

    }

    public function listOfAttendantChoices(): array
    {
        //CacheService::clearUsers();
        $minutes = 24 * 60;
        return Cache::remember('usersListOfAttendantChoices', $minutes, function () {

            return User::select('users.id', 'users.name as label')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->whereNotIn('role_user.role_id', [Role::DELIVERYMAN, Role::CLIENT])
                ->orderBy('users.name')
                ->distinct()
                ->get()
                ->toArray();
        });
    }

    public function listOfClientChoices(): array
    {

        $minutes = 24 * 60;
        return Cache::remember('usersListOfClientChoices', $minutes, function () {

            return User::select('users.id', 'users.name as label')
                //->join('role_user', 'role_user.user_id', '=', 'users.id')
                //->whereNotIn('role_user.role_id', [Role::DELIVERYMAN, Role::CLIENT])
                ->orderBy('users.name')
                ->distinct()
                ->get()
                ->toArray();
        });
    }
}
