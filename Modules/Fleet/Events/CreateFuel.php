<?php

namespace Modules\Fleet\Events;

use Illuminate\Queue\SerializesModels;

class CreateFuel
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $request;
    public $fuel;

    public function __construct($request ,$fuel)
    {
        $this->request = $request;
        $this->fuel = $fuel;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
