<?php

namespace App\Listeners;

use App\Events\OnAddPageEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddPageListener
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
     * @param  OnAddPageEvent  $event
     * @return void
     */
    public function handle(OnAddPageEvent $event)
    {
        \Log::info('Page saved in database', [$event->getUserName() => $event->getPageName()]);
    }
}
