@extends('layouts.app')

@section('content')
<style>
    /* Animated gradient background */
    body {
        background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #a18cd1, #fbc2eb);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    @keyframes gradientBG {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    .verification-container {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border-radius: 15px;
        padding: 40px;
        max-width: 600px;
        width: 100%;
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
        border: 1px solid rgba(255,255,255,0.3);
        color: #fff;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
    }

    select, input, textarea {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        border: none;
        outline: none;
        font-size: 15px;
    }

    select {
        background: rgba(255,255,255,0.2);
        color: #0e0c0cff;
    }

    input, textarea {
        background: rgba(255,255,255,0.25);
        color: #fff;
    }

    .btn {
        display: inline-block;
        background: #4f46e5;
        color: #fff;
        padding: 12px 25px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        transition: 0.3s;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background: #4338ca;
    }

    .alert-success {
        background: rgba(72, 187, 120, 0.7);
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
    }

    .alert-error {
        background: rgba(220, 53, 69, 0.7);
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
    }
</style>

<div class="verification-container">
    <h1>Patient Verification</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patient.verify.send') }}" method="POST">
        @csrf

        <label for="patient_id">Select Patient</label>
        <select name="patient_id" id="patient_id" required>
            <option value="">-- Choose Patient --</option>
            @foreach($patients as $patient)
                <option value="{{ $patient->id }}">{{ $patient->patient_name }} ({{ $patient->patient_id }})</option>
            @endforeach
        </select>

        <label for="message">Message / Notes</label>
        <textarea name="message" id="message" rows="4" placeholder="Enter any notes..." required></textarea>

        <button type="submit" class="btn">Verify Patient</button>
    </form>
</div>
@endsection
