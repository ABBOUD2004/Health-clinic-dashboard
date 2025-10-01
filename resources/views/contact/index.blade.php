{{-- resources/views/contact/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <style>
        body {
            background: linear-gradient(270deg, #ff6ec4, #7873f5, #42e695);
            background-size: 600% 600%;
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

        .contact-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 15px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        .contact-card h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
        }

        .contact-card label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .contact-card input,
        .contact-card textarea,
        .contact-card select {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.25);
            color: #fff;
            font-size: 14px;
        }

        .contact-card input::placeholder,
        .contact-card textarea::placeholder,
        .contact-card select {
            color: #161313ff;
        }

        .contact-card button {
            background: #4f46e5;
            color: #fff;
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .contact-card button:hover {
            background: #4338ca;
        }

        .success-message {
            background: rgba(0, 255, 0, 0.25);
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
            font-weight: 600;
        }
    </style>

    <div class="contact-card">
        <h1>Contact a Patient</h1>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="patient_id" class="form-label text-white">Select Patient</label>
                <select name="patient_id" id="patient_id" class="form-select glass-input" required>
                    <option value="">-- Choose Patient --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->patient_id }}">{{ $patient->patient_name }}</option>
                    @endforeach
                </select>
                @error('patient_id') <small class="text-warning">{{ $message }}</small> @enderror
            </div>




            <label for="message">Message</label>
            <textarea name="message" id="message" rows="5" placeholder="Write your message..." required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

@endsection