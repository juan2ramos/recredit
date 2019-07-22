<?php

namespace App\Modules\Admin\Policies;

use App\Models\Credit;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CreditPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Credit $credit): bool
    {

        if ($credit->validated || $user->isPoint()) {
            return false;
        }
        return true;
    }


}
