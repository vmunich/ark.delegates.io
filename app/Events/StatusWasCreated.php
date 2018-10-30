<?php

namespace App\Events;

use App\Models\Status;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class StatusWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The status in question.
     *
     * @var \App\Models\Status
     */
    public $status;

    /**
     * Create a new event instance.
     */
    public function __construct(Status $status)
    {
        $this->status = $status;
    }
}
