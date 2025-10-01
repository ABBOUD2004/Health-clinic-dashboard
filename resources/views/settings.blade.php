@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">
    <div class="glass-card p-5 w-100" style="max-width: 600px; border-radius: 20px; backdrop-filter: blur(15px); background: rgba(255, 255, 255, 0.1); border: 1px solid rgba(255, 255, 255, 0.2); box-shadow: 0 8px 32px rgba(0,0,0,0.1);">

        <h2 class="mb-4 text-white text-center">User Settings</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.settings.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-white">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label text-white">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label text-white">Address</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3">Save Settings</button>
        </form>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
        min-height: 100vh;
    }

    .form-control {
        background: rgba(255, 255, 255, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        backdrop-filter: blur(10px);
    }

    .form-control:focus {
        box-shadow: 0 0 10px rgba(255,255,255,0.3);
        border-color: rgba(255,255,255,0.5);
        background: rgba(255, 255, 255, 0.25);
        color: #fff;
    }

    .form-label {
        font-weight: 500;
    }

    .btn-primary {
        background-color: rgba(255, 255, 255, 0.2);
        border: none;
        color: #fff;
        font-weight: 600;
        backdrop-filter: blur(10px);
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: rgba(255, 255, 255, 0.35);
    }

    .alert-success {
        background-color: rgba(0, 255, 100, 0.2);
        color: #fff;
        border: none;
        backdrop-filter: blur(10px);
    }
</style>
@endsection
