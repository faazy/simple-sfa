<?php namespace Common\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class WarehousePolicy
{
    use HandlesAuthorization;

    public function index(User $user)
    {
        return $user->hasPermission('warehouse.view');
    }

    public function show(User $user)
    {
        return $user->hasPermission('warehouse.view');
    }

    public function store(User $user)
    {
        return $user->hasPermission('warehouse.create');
    }

    public function update(User $user)
    {
        return $user->hasPermission('warehouse.update');
    }

    public function destroy(User $user)
    {
        return $user->hasPermission('warehouse.delete');
    }
}