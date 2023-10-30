<?php

namespace Modules\Fleet\Events;

use Illuminate\Queue\SerializesModels;

class DestroyMaintenances
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $maintenance;

    public function __construct($maintenance)
    {
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
