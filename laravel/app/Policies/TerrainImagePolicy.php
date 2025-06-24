<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TerrainImage;

class TerrainImagePolicy
{
    public function view(User $user, TerrainImage $image): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function delete(User $user, TerrainImage $image): bool
    {
        return $user->id === $image->terrain->owner_id;
    }
}
