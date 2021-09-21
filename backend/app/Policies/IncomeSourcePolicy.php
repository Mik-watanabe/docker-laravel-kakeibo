<?php

namespace App\Policies;

use App\Models\User;
use App\Models\IncomeSource;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncomeSourcePolicy
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

    public function manage(User $user, IncomeSource $incomeSource): bool
    {
        return $user->id === $incomeSource->user_id;
    }
}
