<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\PatientRequest;

class PatientRequestCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;

    public function __construct(PatientRequest $request)
    {
        $this->request = $request;
    }

    public function broadcastOn()
    {
        return new Channel('patient-requests');
    }
}
