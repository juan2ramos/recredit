<?php

namespace App\Modules\CreditRequest\Policies;

use App\Models\Reference;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReferencePolicy
{
    use HandlesAuthorization;
    use PolicyManager;

    function view(User $user)
    {
        $user = $this->getUserToEvaluate($user);

        return $user->hasClient();
    }

    public function create(User $user)
    {
        return $this->view($user);
    }

    public function update(User $user, $references)
    {
        $user = $this->getUserToEvaluate($user);

        return $this->getUserToEvaluate($user)->references->first()->id== $references->first()->id;

    }


}
