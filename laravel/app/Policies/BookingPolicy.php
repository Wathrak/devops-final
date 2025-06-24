<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Booking;

class BookingPolicy
{
    public function view(User $user, Booking $booking): bool
    {
        return $user->id === $booking->renter_id || $user->id === $booking->terrain->owner_id;
    }

    public function create(User $user): bool
    {
        return true; // All users can book
    }

    public function update(User $user, Booking $booking): bool
    {
        return $user->id === $booking->renter_id;
    }

    public function delete(User $user, Booking $booking): bool
    {
        return $user->id === $booking->renter_id;
    }
}
