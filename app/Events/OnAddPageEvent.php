<?php

namespace App\Events;

use App\Page;
use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OnAddPageEvent
{
    use SerializesModels;

    /**
     * @var string
     */
    private $userName;
    /**
     * @var string
     */
    private $pageName;

    /**
     * Create a new event instance.
     * @param Page $page
     * @param User $user
     */
    public function __construct(Page $page, User $user)
    {
        $this->userName = $user->name;
        $this->pageName = $page->title;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getPageName()
    {
        return $this->pageName;
    }
    
}
