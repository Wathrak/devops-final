<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Payment;

class PaymentPolicy
{
    public function view(User $user, Payment $payment): bool
    {
        return $user->id === $payment->booking->renter_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Payment $payment): bool
    {
        return false;
    }

    public function delete(User $user, Payment $payment): bool
    {
        return false;
    }
}
