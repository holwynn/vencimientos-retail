<?php

namespace App\Listeners;

use App\Log as DatabaseLog;
use Carbon\Carbon;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductEventSubscriber
{
    public function onProductCreation($events) {
        $this->log($events, 'Creacion');
    }

    public function onProductUpdate($events) {
        $this->log($events, 'Actualizacion');
    }

    public function onProductDeletion($events) {
        $this->log($events, 'Borrado');
    }

    public function log($events, $message, $level = 'info') {
        DatabaseLog::create([
            'level' => $level,
            'type' => 'products',
            'model_id' => $events->product->id,
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
            'App\Events\Products\Create',
            'App\Listeners\ProductEventSubscriber@onProductCreation'
        );

        // Update
        $events->listen(
            'App\Events\Products\Update',
            'App\Listeners\ProductEventSubscriber@onProductUpdate'
        );

        // Delete
        $events->listen(
            'App\Events\Products\Delete',
            'App\Listeners\ProductEventSubscriber@onProductDeletion'
        );
    }
}
