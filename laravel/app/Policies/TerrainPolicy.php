<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Terrain;

class TerrainPolicy
{
    public function view(User $user, Terrain $terrain): bool
    {
        return true; // All users can view
    }

    public function create(User $user): bool
    {
        return true; // All authenticated users can create
    }

    public function update(User $user, Terrain $terrain): bool
    {
        return $user->id === $terrain->owner_id;
    }

    public function delete(User $user, Terrain $terrain): bool
    {
        return $user->id === $terrain->owner_id;
    }
}
