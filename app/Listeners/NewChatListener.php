<?php

namespace App\Listeners;

use App\Events\NewChat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewChatListener
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
     * @param  \App\Events\NewChat  $event
     * @return void
     */
    public function handle(NewChat $event)
    {
        //
    }
}
