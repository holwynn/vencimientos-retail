<?php

namespace App\Events\Expirations;

use App\User;
use App\Expiration;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Delete
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $expiration;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, Expiration $expiration)
    {
        $this->user = $user;
        $this->expiration = $expiration;
    }
}
