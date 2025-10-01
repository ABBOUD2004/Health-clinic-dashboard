@extends('layouts.app')

@section('content')
    <style>
        /* Animated Gradient Background */
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
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Glassmorphism Card */
        .form-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            width: 100%;
            max-width: 500px;
            animation: fadeInUp 1s ease;
            color: #fff;
        }

        @keyframes fadeInUp {
            from {
                transform: translateY(30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .form-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .form-header h1 {
            font-weight: 700;
            color: #fff;
        }

        .form-control {
            border-radius: 12px;
            padding-left: 40px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-group {
            position: relative;
        }

        .form-group i {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #ddd;
        }

        .btn-custom {
            border-radius: 12px;
            font-weight: 600;
            padding: 0.75rem;
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
{{-- فوق الفورم مباشرة --}}
@if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container">
        <div class="form-card">
            <div class="form-header">
                <h1>Patient Registration</h1>
                <p class="text-light">Fill in the details below to add a new patient</p>
            </div>

            <form action="{{ route('patients.store') }}" method="POST">
                @csrf

                <!-- Patient Name -->
                <div class="form-group mb-3">
                    <i class="bi bi-person-fill"></i>
                    <input type="text" name="patient_name" class="form-control" placeholder="Patient Name" required>
                </div>

                <!-- Patient ID -->
                <div class="form-group mb-3">
                    <i class="bi bi-card-text"></i>
                    <input type="text" name="patient_id" class="form-control" placeholder="Patient ID / National ID"
                        required>
                </div>

                <!-- Age -->
                <div class="form-group mb-3">
                    <i class="bi bi-hourglass-split"></i>
                    <input type="number" name="age" class="form-control" placeholder="Age" required>
                </div>

                <!-- Disease / Diagnosis -->
                <div class="form-group mb-3">
                    <i class="bi bi-heart-pulse-fill"></i>
                    <input type="text" name="disease" class="form-control" placeholder="Disease / Diagnosis" required>
                </div>

                <!-- Doctor Name -->
                <div class="form-group mb-3">
                    <i class="bi bi-person-badge-fill"></i>
                    <select name="doctor_id" class="form-select" required>
                        <option value="">-- Choose Doctor --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialty }})</option>
                        @endforeach
                    </select>
                </div>


                <!-- Appointment Date -->
                <div class="form-group mb-3">
                    <i class="bi bi-calendar-date-fill"></i>
                    <input type="date" name="appointment_date" class="form-control" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-custom w-100">
                    <i class="bi bi-check-circle-fill me-1"></i> Register Patient
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
