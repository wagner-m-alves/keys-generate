<?php

namespace App\Providers;

use App\Events\Game\BettingEvent;
use App\Events\PaymentSystemResponseEvent;
use App\Listeners\EncryptDataReturnedByPaymentSystemListener;
use App\Listeners\EncryptDataBeforeSendingListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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

        BettingEvent::class => [
            EncryptDataBeforeSendingListener::class,
        ],

        PaymentSystemResponseEvent::class => [
            EncryptDataReturnedByPaymentSystemListener::class,
        ],
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
