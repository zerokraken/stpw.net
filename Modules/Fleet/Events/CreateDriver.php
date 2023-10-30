<?php

namespace Modules\Fleet\Events;

use Illuminate\Queue\SerializesModels;

class CreateDriver
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $request;
    public $driver;

    public function __construct($request ,$driver)
    {
        $this->request = $request;
        $this->driver = $driver;
       
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
