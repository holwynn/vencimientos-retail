<?php

namespace App\Listeners;

use App\Log as DatabaseLog;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpirationEventSubscriber
{
    public function onExpirationCreation($events) {
        $this->log($events, 'Creacion');
    }

    public function onExpirationUpdate($events) {
        $this->log($events, 'Actualizacion');
    }

    public function onExpirationDeletion($events) {
        $this->log($events, 'Borrado');
    }

    public function onExpirationCheck($events) {
        $this->log($events, 'Revisado');
    }

    public function log($events, $message, $level = 'info') {
        DatabaseLog::create([
            'level' => $level,
            'type' => 'expirations',
            'model_id' => $events->expiration->id,
            'user_id' => $events->user->id,
            'message' => $message,
        ]);   
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        //Create
        $events->listen(
            'App\Events\Expirations\Create',
            'App\Listeners\ExpirationEventSubscriber@onExpirationCreation'
        );

        // Update
        $events->listen(
            'App\Events\Expirations\Update',
            'App\Listeners\ExpirationEventSubscriber@onExpirationUpdate'
        );

        // Delete
        $events->listen(
            'App\Events\Expirations\Delete',
            'App\Listeners\ExpirationEventSubscriber@onExpirationDeletion'
        );

        // Check
        $events->listen(
            'App\Events\Expirations\Check',
            'App\Listeners\ExpirationEventSubscriber@onExpirationCheck'
        );
    }
}
