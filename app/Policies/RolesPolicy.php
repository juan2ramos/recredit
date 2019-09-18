<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolesPolicy
{
    use HandlesAuthorization;

    public function superAdmin(User $user){
        return $user->isSuperAdmin();
    }

    public function analyst(User $user){
        return $user->isSuperAdmin() || $user->isAnalysts();
    }

    public function admin(User $user){
        return $user->isSuperAdmin() || $user->isAnalysts() || $user->isPoint();
    }

}
