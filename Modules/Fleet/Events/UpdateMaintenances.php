<?php

namespace Modules\Fleet\Events;

use Illuminate\Queue\SerializesModels;

class UpdateMaintenances
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $request;
    public $maintenance;

    public function __construct($request ,$maintenance)
    {
        $this->request = $request;
        $this->maintenance = $maintenance;
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
