<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <style>
        /* خلفية متحركة */
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(270deg, #74ebd5, #ACB6E5, #74ebd5);
            background-size: 600% 600%;
            animation: gradientBG 12s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        @keyframes gradientBG {
            0% {background-position: 0% 50%;}
            50% {background-position: 100% 50%;}
            100% {background-position: 0% 50%;}
        }

        .profile-card {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            width: 450px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            color: #fff;
            text-align: center;
            animation: fadeIn 1.2s ease;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h2 {
            margin-bottom: 15px;
            font-size: 26px;
            color: #fff;
        }

        .detail {
            margin: 12px 0;
            padding: 12px;
            border-radius: 12px;
            background: rgba(255,255,255,0.15);
            font-size: 18px;
            transition: 0.3s;
        }

        .detail:hover {
            background: rgba(255,255,255,0.3);
            transform: scale(1.03);
        }

        .doctor-card {
            margin-top: 20px;
            padding: 15px;
            border-radius: 15px;
            background: rgba(0,0,0,0.3);
        }

        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            border-radius: 25px;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: rgba(255,255,255,0.4);
        }
    </style>
</head>
<body>

    <div class="profile-card">
        <h2>Patient Profile</h2>

        <div class="detail"><strong>Name:</strong> {{ $patient->patient_name }}</div>
        <div class="detail"><strong>Patient ID:</strong> {{ $patient->patient_id }}</div>
        <div class="detail"><strong>Age:</strong> {{ $patient->age }}</div>
        <div class="detail"><strong>Disease / Diagnosis:</strong> {{ $patient->disease }}</div>
        <div class="detail"><strong>Appointment Date:</strong> {{ $patient->appointment_date }}</div>

        @if($patient->doctor)
        <div class="doctor-card">
            <h3>Assigned Doctor</h3>
            <p><strong>Name:</strong> {{ $patient->doctor->name }}</p>
            <p><strong>Specialization:</strong> {{ $patient->doctor->specialization }}</p>
        </div>
        @endif

        <a href="{{ route('patients.index') }}" class="btn-back">⬅ Back to Patients</a>
    </div>

</body>
</html>
