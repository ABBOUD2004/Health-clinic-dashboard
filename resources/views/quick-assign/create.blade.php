@extends('layouts.app')

@section('title', 'Quick Assign')

@section('content')
<div class="container py-5">

    <h2 class="mb-5 text-center text-white fw-bold glow-text">Quick Assign Appointment</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('quick.assign.store') }}" method="POST" class="card p-5 shadow-lg glass-card mx-auto" style="max-width:600px;">
        @csrf

        <div class="mb-4">
            <label for="doctor_id" class="form-label text-white">Select Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-select glass-input" required>
                <option value="">-- Choose Doctor --</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
            @error('doctor_id') <small class="text-warning">{{ $message }}</small> @enderror
        </div>

       <div class="mb-4">
    <label for="patient_id" class="form-label text-white">Select Patient</label>
    <select name="patient_id" id="patient_id" class="form-select glass-input" required>
        <option value="">-- Choose Patient --</option>
        @foreach($patients as $patient)
            <option value="{{ $patient->id }}">{{ $patient->patient_name }}</option>
        @endforeach
    </select>
    @error('patient_id') <small class="text-warning">{{ $message }}</small> @enderror
</div>


        <div class="mb-4">
            <label for="appointment_time" class="form-label text-white">Appointment Time</label>
            <input type="datetime-local" name="appointment_time" id="appointment_time" class="form-control glass-input" required>
            @error('appointment_time') <small class="text-warning">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-neon w-100 fw-bold shadow-sm">Assign</button>
    </form>
</div>

<style>
/* Dark Animated Gradient Background */
body {
    background: linear-gradient(-45deg, #0f172a, #1e293b, #334155, #1e293b);
    background-size: 400% 400%;
    animation: gradientBG 20s ease infinite;
    min-height: 100vh;
    transition: background 0.5s ease;
}

@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

/* Glassmorphism Card */
.glass-card {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.1);
    color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-7px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.5);
}

/* Inputs / Select */
.glass-input {
    background: rgba(255,255,255,0.08);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.2);
    transition: 0.3s;
}

.glass-input:focus {
    background: rgba(255,255,255,0.15);
    border: 1px solid #3b82f6;
    box-shadow: 0 0 10px rgba(59,130,246,0.5);
    color: #1e1717ff;
    outline: none;
}

/* Neon Button */
.btn-neon {
    background: linear-gradient(90deg, #3b82f6, #06b6d4);
    color: #fff;
    font-weight: 600;
    border-radius: 12px;
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0 0 10px #3b82f6, 0 0 20px #06b6d4;
}

.btn-neon:hover {
    transform: translateY(-3px) scale(1.05);
    box-shadow: 0 0 20px #3b82f6, 0 0 40px #06b6d4, 0 0 60px #0ea5e9;
}

/* Glowing Text */
.glow-text {
    text-shadow: 0 0 5px #06b6d4, 0 0 10px #3b82f6, 0 0 20px #0ea5e9;
}
</style>
@endsection
