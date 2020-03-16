<?php

namespace App\Providers\App\Listeners;

use App\Events\NewCustomerHasRegisterdEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterCustomerToNewsLetter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewCustomerHasRegisterdEvent  $event
     * @return void
     */
    public function handle(NewCustomerHasRegisterdEvent $event)
    {
        //
    }
}
