@extends('layouts.app')

@section('content')
<style>
    /* Dark Background */
    body {
        background: linear-gradient(135deg, #1e1e2f, #12121c);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Glass Card */
    .invite-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(15px) saturate(180%);
        -webkit-backdrop-filter: blur(15px) saturate(180%);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 2rem;
        border-radius: 1.5rem;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
        width: 100%;
        max-width: 500px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: #fff;
    }

    .invite-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.6);
    }

    .invite-card h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #f0f0f0;
    }

    /* Form Inputs */
    .form-control {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        color: #fff;
        transition: all 0.3s ease;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: #00f0ff;
        box-shadow: 0 0 0 0.2rem rgba(0, 255, 255, 0.25);
        color: #fff;
    }

    /* Submit Button */
    .btn-primary {
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        width: 100%;
        background: linear-gradient(90deg, #00f0ff, #007bff);
        border: none;
        font-weight: bold;
        transition: all 0.3s ease;
        color: #12121c;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 255, 255, 0.4);
    }

    /* Success/Error Messages */
    .alert {
        border-radius: 0.75rem;
        margin-bottom: 1rem;
        color: #12121c;
    }
</style>

<div class="invite-card">
    <h2>Invite Team Member</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('invite.team.submit') }}" method="POST">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Team member email" required>
        <button type="submit" class="btn btn-primary">Send Invite</button>
    </form>
</div>
@endsection
