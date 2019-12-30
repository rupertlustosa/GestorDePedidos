<?php

declare(strict_types=1);

namespace Modules\Authentication\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Authentication\Models\Role;

class RoleService
{

    private function buildQuery(): Builder
    {

        $query = Role::query();

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

    public function find(int $id): ?Role
    {

        return Role::find($id);
    }

    public function create(array $data): Role
    {

        $role = new Role();
        $role->fill($data);
        $role->save();

        return $role;
        //return DB::transaction(function () use ($data) {
        //});
    }

    public function update(array $data, Role $role): Role
    {

        $role->fill($data);
        $role->save();

        return $role;
    }

    public function delete(Role $role): ?bool
    {

        return $role->delete();
    }

    public function listOfChoices(): array
    {

        return Role::select('id', 'name as label')
            ->orderBy('name')
            ->get()
            ->toArray();

    }
}
