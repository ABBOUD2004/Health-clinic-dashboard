@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="glass-card p-4 rounded-4 shadow-lg">
        <h2 class="fw-bold mb-3 text-center">Patient Registration</h2>
        <p class="text-center text-muted mb-4">Fill in the details below to add a new patient</p>

        <form action="{{ route('patients.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Patient Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Patient ID / National ID</label>
                <input type="text" name="national_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Disease / Diagnosis</label>
                <input type="text" name="diagnosis" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Choose Doctor</label>
                <select name="doctor_id" class="form-select" required>
                    <option value="">-- Select Doctor --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }} - {{ $doctor->specialization }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary px-5 rounded-pill">Register Patient</button>
            </div>
        </form>
    </div>
</div>

<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
</style>
@endsection
