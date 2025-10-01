@extends('layouts.app')

@section('content')
<style>
    /* خلفية متحركة بتدرج لوني */
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: linear-gradient(-45deg, #43cea2, #185a9d, #667eea, #764ba2);
        background-size: 400% 400%;
        animation: gradientBG 15s ease infinite;
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @keyframes gradientBG {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    /* الحاوية الزجاجية */
    .tour-container {
        max-width: 800px;
        margin: 50px;
        padding: 40px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
        color: #fff;
    }

    .tour-container h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 2.2rem;
    }

    .tour-container p {
        text-align: center;
        margin-bottom: 40px;
        color: #e0e0e0;
    }

    /* خطوات الدليل */
    .tour-step {
        margin-bottom: 25px;
        padding: 25px;
        border-left: 5px solid rgba(255,255,255,0.6);
        background: rgba(255,255,255,0.05);
        border-radius: 15px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .tour-step:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .tour-step h3 {
        margin-bottom: 10px;
        color: #fff;
        font-size: 1.4rem;
    }

    .tour-step p {
        color: #ddd;
        font-size: 1rem;
    }

    /* زر الانتقال */
    .tour-btn {
        display: inline-block;
        margin: 0 auto;
        background: rgba(255,255,255,0.2);
        color: #fff;
        padding: 12px 30px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 500;
        text-align: center;
        display: block;
        transition: background 0.3s, transform 0.3s;
    }

    .tour-btn:hover {
        background: rgba(255,255,255,0.4);
        transform: translateY(-3px);
    }
</style>

<div class="tour-container">
    <h1>Guided Tour</h1>
    <p>Welcome to your app tour! Follow these steps to get started.</p>

    <div class="tour-step">
        <h3>Step 1: Dashboard Overview</h3>
        <p>Here you can see your statistics, recent activity, and important notifications.</p>
    </div>

    <div class="tour-step">
        <h3>Step 2: Manage Patients</h3>
        <p>Access all patient requests and appointments. You can assign doctors or update status.</p>
    </div>

    <div class="tour-step">
        <h3>Step 3: Invite Team Members</h3>
        <p>Send invites to colleagues so they can collaborate within your system.</p>
    </div>

    <div class="tour-step">
        <h3>Step 4: Settings</h3>
        <p>Configure your profile, notifications, and application preferences here.</p>
    </div>

    <a href="{{ route('dashboard') }}" class="tour-btn">Go to Dashboard</a>
</div>
@endsection
