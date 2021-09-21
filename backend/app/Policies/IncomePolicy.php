<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Income;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncomePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function manage(User $user, Income $income): bool
    {
        return $user->id === $income->user_id;
    }
}
