<?php

namespace App\Events;

use App\Models\Player;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PaymentSystemResponseEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $player;

    public function __construct(Player $player)
    {
        $this->player = $player;
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
