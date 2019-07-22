<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Credit;
use App\Models\File;
use App\Models\Reference;
use App\Modules\Admin\Policies\CreditPolicy;
use App\Modules\CreditRequest\Policies\ClientPolicy;
use App\Modules\CreditRequest\Policies\FilePolicy;
use App\Modules\CreditRequest\Policies\ReferencePolicy;
use App\Modules\CreditRequest\Policies\UserPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Client::class => ClientPolicy::class,
        User::class => UserPolicy::class,
        Reference::class => ReferencePolicy::class,
        File::class => FilePolicy::class,
        Credit::class => CreditPolicy::class
    ];


    public function boot()
    {
        $this->registerPolicies();
        Gate::define('superAdmin', 'App\Policies\RolesPolicy@superAdmin');
        Gate::define('analyst', 'App\Policies\RolesPolicy@analyst');

    }
}
