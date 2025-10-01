<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PatientRequest;

class PatientRequestsNotification extends Component
{
    public $requestsCount;

    public function mount()
    {
        $this->requestsCount = PatientRequest::where('status', 'action_required')->count();
    }

    public function render()
    {
        return view('livewire.patient-requests-notification');
    }

    // تحديث العداد كل فترة (مثلاً 5 ثواني)
    public function getListeners()
    {
        return [
            "echo:patient-requests,PatientRequestCreated" => 'updateCount'
        ];
    }

    public function updateCount($event)
    {
        $this->requestsCount++;
    }
}
