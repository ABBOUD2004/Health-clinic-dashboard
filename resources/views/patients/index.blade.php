@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(-45deg, #43cea2, #185a9d, #667eea, #764ba2);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .patient-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        padding: 1.5rem;
        color: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .patient-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.3);
    }

    .patient-card h5 {
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .patient-card .info {
        font-size: 14px;
        opacity: 0.9;
    }

    .btn-custom {
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 14px;
        background: rgba(255, 255, 255, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        background: rgba(255, 255, 255, 0.4);
        color: #000;
    }
</style>

<div class="container py-5">
    <h2 class="text-center text-white mb-5">Patients List</h2>

    <div class="row g-4">
        @forelse($patients as $patient)
            <div class="col-md-6 col-lg-4">
                <div class="patient-card h-100">
                    <h5><i class="bi bi-person-circle"></i> {{ $patient->name }}</h5>
                    <p class="info mb-1"><strong>ID:</strong> {{ $patient->id }}</p>
                    <p class="info mb-1"><strong>Disease:</strong> {{ $patient->disease ?? 'N/A' }}</p>
                    <p class="info mb-1"><strong>Doctor:</strong> {{ $patient->doctor ?? 'N/A' }}</p>
                    <p class="info mb-1"><strong>Appointment:</strong>
                        {{ $patient->appointment_date ? $patient->appointment_date->format('Y-m-d') : 'N/A' }}
                    </p>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="patient-card text-center">
                    <p>No patients found.</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('patients.create') }}" class="btn btn-custom">
            <i class="bi bi-plus-circle"></i> Add New Patient
        </a>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
