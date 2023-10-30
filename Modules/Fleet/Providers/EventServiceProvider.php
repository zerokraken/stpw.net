<?php

namespace Modules\Fleet\Providers;

use App\Events\GivePermissionToRole;
use Illuminate\Support\ServiceProvider;
use Modules\Fleet\Listeners\GiveRoleToPermission;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        GivePermissionToRole::class =>[
            GiveRoleToPermission::class
        ],
    ];
}
