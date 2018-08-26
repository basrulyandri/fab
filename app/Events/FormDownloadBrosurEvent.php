<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class FormDownloadBrosurEvent
{
    use InteractsWithSockets, SerializesModels;
    public $aplikan;    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($aplikan)
    {
        $this->aplikan = $aplikan;            
    }



}
