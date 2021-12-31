<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use App\Events\UserInvitedToWorkspace;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\ChangeStatusAfterLogin;
use App\Listeners\ChangeStatusAfterLogout;
use App\Listeners\SendWorkspaceInvitationToUser;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Login::class => [
            ChangeStatusAfterLogin::class,
        ],
        Logout::class => [
            ChangeStatusAfterLogout::class,
        ],
        UserInvitedToWorkspace::class => [
            SendWorkspaceInvitationToUser::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
