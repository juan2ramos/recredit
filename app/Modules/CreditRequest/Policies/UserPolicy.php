<?php

namespace App\Modules\CreditRequest\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    use PolicyManager;

    function update(User $user, User $model):bool
    {
        $user = $this->getUserToEvaluate($user);
        return $user['id'] === $model->id;
    }

}
