@extends('layouts.app')

@section('content')
<style>
    /* خلفية الصفحة */
    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* الكارت الزجاجي الكبير */
    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        width: 900px; /* عرض أكبر */
        max-width: 95%;
        padding: 40px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        color: #fff;
    }

    /* الحقول الزجاجية */
    .glass-input {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        color: #fff;
        padding: 10px 15px;
        width: 100%;
    }

    .glass-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    /* زر الزجاجي */
    .glass-btn {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        border-radius: 20px;
        padding: 12px;
        font-size: 1.2rem;
        transition: all 0.3s ease;
    }

    .glass-btn:hover {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    /* عنوان الكارت */
    .glass-card h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.2rem;
    }

    /* رسالة النجاح */
    .glass-alert {
        background: rgba(0, 255, 0, 0.15);
        color: #fff;
        border: 1px solid rgba(0, 255, 0, 0.3);
        border-radius: 15px;
        padding: 10px 20px;
        margin-bottom: 20px;
    }
</style>

<div class="glass-card">
    <h2>Organisation Settings</h2>

    @if(session('success'))
        <div class="alert glass-alert alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('organisation.settings.update') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Organisation Name</label>
            <input type="text" name="name" id="name" class="glass-input" value="{{ old('name', $organisation['name']) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" name="email" id="email" class="glass-input" value="{{ old('email', $organisation['email']) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-semibold">Phone</label>
            <input type="text" name="phone" id="phone" class="glass-input" value="{{ old('phone', $organisation['phone']) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label fw-semibold">Address</label>
            <input type="text" name="address" id="address" class="glass-input" value="{{ old('address', $organisation['address']) }}" required>
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="glass-btn">Save Settings</button>
        </div>
    </form>
</div>
@endsection
