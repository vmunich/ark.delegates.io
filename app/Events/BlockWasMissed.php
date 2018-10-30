<?php

namespace App\Events;

use App\Models\Delegate;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class BlockWasMissed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The delegate in question.
     *
     * @var \App\Models\Delegate
     */
    public $delegate;

    /**
     * Create a new event instance.
     */
    public function __construct(Delegate $delegate)
    {
        $this->delegate = $delegate;
    }
}
