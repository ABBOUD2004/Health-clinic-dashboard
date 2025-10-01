@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <style>
        /* Background Animation */
        body {
            background: linear-gradient(-45deg, #0f2027, #203a43, #2c5364, #1c1c1c);
            background-size: 400% 400%;
            animation: gradientBG 12s ease infinite;
            color: #fff;
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

        /* Glassmorphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 18px;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.6);
        }

        .request-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 16px;
            margin-bottom: 16px;
            transition: all 0.3s ease;
        }

        .request-card:hover {
            background: rgba(255, 255, 255, 0.18);
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            border-radius: 12px;
            transition: all 0.3s ease;
            padding: 8px 15px;
        }

        .btn-glass:hover {
            background: rgba(255, 255, 255, 0.4);
            color: #000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .glass-dropdown {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-dropdown .dropdown-item {
            color: #fff;
            transition: all 0.2s;
        }

        .glass-dropdown .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #000;
            border-radius: 8px;
        }
    </style>

    <div class="container-fluid">
   <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 glass-card p-3 shadow-lg">
        <div class="mb-3 mb-md-0">
            <h4 class="fw-bold text-white">Welcome back, {{ $user->name ?? 'User' }} 🎉</h4>
            <p class="text-light mb-0">
                You have <span class="fw-bold text-danger">{{ $outstandingReviews }}</span> outstanding review and
                <span class="fw-bold text-success">{{ $tasks }}</span> tasks.<br>
                Last login:
                {{ $user->last_login_at ? $user->last_login_at->format('M d, Y, h:i A') : now()->format('M d, Y, h:i A') }}.
            </p>
        </div>

        <div class="d-flex align-items-center gap-3">
            <!-- New Patient Request -->
            <a href="{{ route('patients.create') }}" class="btn btn-glass">
                <i class="fa fa-plus"></i> New Request
            </a>

            <a href="{{ route('doctors.create') }}" class="btn btn-glass">
                + Create Doctor
            </a>

            <!-- Notifications -->
            <div class="dropdown">
                <button class="btn btn-glass position-relative" data-bs-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $patients->count() }}
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow glass-dropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('patients.index') }}">
                            New patient requests ({{ $patients->count() }})
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('tasks.index') }}">
                            Pending tasks ({{ $tasks }})
                        </a>
                    </li>
                </ul>
            </div>

            <!-- User Menu -->
            <div class="dropdown">
                <button class="btn btn-glass dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-2"
                        style="width:40px; height:40px;">
                        {{ strtoupper(substr($user->name ?? 'AD', 0, 2)) }}
                    </div>
                    {{ $user->name ?? 'Demo User' }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow glass-dropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Section -->
    <div class="row">
        <!-- Left (Patients Cards) -->
        <div class="col-lg-8">
            <div class="glass-card shadow-sm mb-4 p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 fw-bold text-info">📋 Latest Patients</h5>
                    <div class="d-flex">
                        <input type="text" class="form-control form-control-sm bg-dark text-light border-0"
                            placeholder="Search...">
                        <button class="btn btn-sm btn-outline-light ms-2"><i class="fa fa-filter"></i></button>
                    </div>
                </div>
                <div class="row g-3">
                    @forelse($patients as $patient)
                        <div class="col-md-6">
                            <div class="request-card h-100">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="fw-bold">{{ $patient->patient_name }}</h6>
                                    <span
                                        class="badge {{ $patient->status == 'action_required' ? 'bg-danger' : ($patient->status == 'pending' ? 'bg-warning text-dark' : 'bg-success') }}">
                                        {{ ucfirst(str_replace('_', ' ', $patient->status ?? 'new')) }}
                                    </span>
                                </div>
                                <p class="small mb-1"><strong>Age:</strong> {{ $patient->age }}</p>
                                <p class="small mb-1"><strong>Disease:</strong> {{ $patient->disease }}</p>
                                <p class="small text-muted"><strong>Doctor:</strong> {{ $patient->doctor->name ?? 'Unassigned' }}</p>
                                <div class="dropdown mt-2">
                                    <button class="btn btn-sm btn-outline-light dropdown-toggle"
                                        data-bs-toggle="dropdown">Action</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('patients.edit', $patient->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item text-danger" type="submit">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-light ms-3">No patients found.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right (Patient Info) -->
        <div class="col-lg-4">
            <div class="glass-card shadow-sm p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0 fw-bold text-info">👩‍⚕️ Patient Info</h5>
                </div>
                <div>
                    @if($patients->first())
                        <ul class="list-unstyled mb-0">
                            <li><strong>Disease:</strong> {{ $patients->first()->disease }}</li>
                            <li><strong>Age:</strong> {{ $patients->first()->age }}</li>
                            <li><strong>Doctor:</strong> {{ $patients->first()->doctor->name ?? 'Unassigned' }}</li>
                        </ul>
                    @else
                        <p class="text-muted">No patient selected.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Assign Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content glass-card text-light">
            <form action="{{ route('patients.assign', $patients->first()->id ?? 0) }}" method="POST">
                @csrf
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="assignModalLabel">Assign Doctor</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if(isset($doctors) && $doctors->count() > 0)
                        <div class="mb-3">
                            <label for="doctor_id" class="form-label">Select Doctor</label>
                            <select name="doctor_id" id="doctor_id" class="form-select" required>
                                <option value="">-- Choose Doctor --</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <p class="text-muted">No doctors available.</p>
                    @endif
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
