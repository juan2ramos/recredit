<?php

namespace App\Modules\CreditRequest\Policies;

use App\Models\Client;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientPolicy
{
    use HandlesAuthorization;
    use PolicyManager;

    function view(User $user)
    {
        $this->getUserToEvaluate($user);

        return true;
    }

    public function create(User $user)
    {
        return $this->view($user);
    }

    public function update(User $user, Client $client)
    {
        $user = $this->getUserToEvaluate($user);

        return $user->client->id == $client->id;

    }


}
