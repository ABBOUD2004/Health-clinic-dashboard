@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')
<div class="container py-5">

    <h2 class="mb-5 text-center text-white fw-bold glow-text">Edit Patient</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('patients.update', $patient->id) }}" method="POST" class="card p-5 shadow-lg glass-card mx-auto" style="max-width:600px;">
        @csrf
        @method('PUT')

        <!-- Patient Name -->
        <div class="mb-4">
            <label for="patient_name" class="form-label text-white">Patient Name</label>
            <input type="text" name="patient_name" id="patient_name" class="form-control glass-input"
                   value="{{ old('patient_name', $patient->patient_name) }}" required>
            @error('patient_name') <small class="text-warning">{{ $message }}</small> @enderror
        </div>

        <!-- Date of Birth -->
        <div class="mb-4">
            <label for="dob" class="form-label text-white">Date of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control glass-input"
                   value="{{ old('dob', $patient->dob) }}" required>
            @error('dob') <small class="text-warning">{{ $message }}</small> @enderror
        </div>

        <!-- Indication -->
        <div class="mb-4">
            <label for="indication" class="form-label text-white">Indication</label>
            <input type="text" name="indication" id="indication" class="form-control glass-input"
                   value="{{ old('indication', $patient->indication) }}" required>
            @error('indication') <small class="text-warning">{{ $message }}</small> @enderror
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label for="status" class="form-label text-white">Status</label>
            <select name="status" id="status" class="form-control glass-input" required>
                <option value="pending" {{ old('status', $patient->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('status', $patient->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="action_required" {{ old('status', $patient->status) == 'action_required' ? 'selected' : '' }}>Action Required</option>
            </select>
            @error('status') <small class="text-warning">{{ $message }}</small> @enderror
        </div>

        <!-- Assigned Doctor -->
        <div class="mb-4">
            <label for="assigned_to" class="form-label text-white">Assigned Doctor (ID)</label>
            <input type="number" name="assigned_to" id="assigned_to" class="form-control glass-input"
                   value="{{ old('assigned_to', $patient->assigned_to) }}">
            @error('assigned_to') <small class="text-warning">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-neon w-100 fw-bold shadow-sm">Update Patient</button>
    </form>
</div>

<style>
/* نفس الستايل اللي عندك */
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
.glass-card {background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(15px); border-radius: 20px; border: 1px solid rgba(255,255,255,0.1); color: #fff;}
.glass-input {background: rgba(255,255,255,0.08); color: #fff; border: 1px solid rgba(255,255,255,0.2);}
.glass-input:focus {background: rgba(255,255,255,0.15); border: 1px solid #3b82f6; box-shadow: 0 0 10px rgba(59,130,246,0.5); color: #fff;}
.btn-neon {background: linear-gradient(90deg, #3b82f6, #06b6d4); color: #fff; font-weight: 600; border-radius: 12px; border: none;}
.btn-neon:hover {transform: translateY(-3px) scale(1.05); box-shadow: 0 0 20px #3b82f6, 0 0 40px #06b6d4, 0 0 60px #0ea5e9;}
.glow-text {text-shadow: 0 0 5px #06b6d4, 0 0 10px #3b82f6, 0 0 20px #0ea5e9;}
</style>
@endsection
