<?php

namespace App\Policies;

use App\Models\Spending;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpendingPolicy
{
    use HandlesAuthorization;

    public function manage(User $user, Spending $spending): bool
    {
        return $user->id === $spending->user_id;
    }
}
