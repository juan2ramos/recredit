<?php

namespace App\Providers;

use App\Models\Client;
use App\Modules\CreditRequest\Policies\ClientPolicy;
use App\Modules\CreditRequest\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Client::class => ClientPolicy::class,
        User::class => UserPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();

    }
}
