<?php

namespace App\Modules\CreditRequest\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;
    use PolicyManager;

    function view(User $user)
    {
        $user = $this->getUserToEvaluate($user);

        return $user->hasReferences() ?? true;
    }





}
