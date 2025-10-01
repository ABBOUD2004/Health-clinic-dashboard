@extends('layouts.app')

@section('content')
<style>
    /* خلفية متدرجة متحركة */
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

    /* كارد زجاجي */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
    }

    .glass-card h3 {
        color: #fff;
        font-weight: 600;
    }

    .glass-card label {
        color: #f1f1f1;
    }

    .btn-primary {
        background: linear-gradient(45deg, #43cea2, #185a9d);
        border: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #764ba2, #667eea);
        transform: scale(1.05);
    }
</style>

<div class="container">
    <div class="glass-card shadow">
        <h3 class="mb-4 text-center">➕ Add New Doctor</h3>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('doctors.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Doctor Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter doctor name" required>
            </div>

            <div class="mb-3">
                <label for="specialty" class="form-label">Specialty</label>
                <input type="text" name="specialty" class="form-control" placeholder="Enter specialty" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Add Doctor</button>
        </form>
    </div>
</div>
@endsection
