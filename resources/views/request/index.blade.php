@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(-45deg, #667eea, #764ba2, #43cea2, #185a9d);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        min-height: 100vh;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 20px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    h2 { color: #fff; font-weight: 600; }
    .badge { font-size: 0.85rem; }
</style>

<div class="container py-5">
    <h2 class="mb-4 text-center">My Pending Tasks</h2>

    @if($tasks->isEmpty())
        <div class="alert alert-info text-center glass-card p-3">
            No pending tasks at the moment 🎉
        </div>
    @else
        <div class="row">
            @foreach($tasks as $task)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card glass-card h-100 p-3">
                        <h5>Patient: {{ $task->patient_name }}</h5>
                        <p>Status: <span class="badge bg-warning text-dark">{{ ucfirst($task->status) }}</span></p>
                        <p>Age: {{ $task->age }}</p>
                        <p>Disease: {{ $task->disease }}</p>
                        <p>Appointment: {{ \Carbon\Carbon::parse($task->appointment_date)->format('d M Y') }}</p>
                        <a href="{{ route('requests.show', $task->id) }}" class="btn btn-primary btn-sm mt-2">View</a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
