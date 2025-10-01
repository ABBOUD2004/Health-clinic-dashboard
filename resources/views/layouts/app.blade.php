<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            transition: background 0.5s ease, color 0.5s ease;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(180deg, #1e3a8a, #334155);
            color: #fff;
            padding-top: 20px;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
        }

        .sidebar h5 {
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            padding: 12px 20px;
            text-decoration: none;
            transition: 0.3s;
            border-radius: 6px;
            margin: 4px 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #3b82f6;
            color: #fff;
            transform: translateX(5px);
        }

        /* Content */
        .content {
            margin-left: 240px;
            padding: 30px;
            animation: fadeIn 1s ease-in-out;
        }

        /* Cards */
        .card-custom {
            border: none;
            border-radius: 15px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
        }

        .card-custom i {
            font-size: 35px;
            margin-bottom: 15px;
            color: #3b82f6;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Dark Mode */
        body.dark-mode {
            background: #121212;
            color: #e0e0e0;
        }

        body.dark-mode .card-custom {
            background: #1e293b;
            color: #e0e0e0;
        }

        body.dark-mode .sidebar {
            background: linear-gradient(180deg, #0f172a, #1e293b);
        }

        .toggle-mode {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            cursor: pointer;
            font-size: 22px;
            color: #fff;
            transition: 0.3s;
        }

        .toggle-mode:hover {
            color: #fbbf24;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h5>Dashboard</h5>
            <a href="{{ route('dashboard') }}"><i class="fa fa-home me-2"></i> Dashboard</a>
            <a href="{{ route('quick.assign.create') }}"><i class="fa fa-bolt me-2"></i> Quick assign</a>
            <a href="{{ route('contact.patients') }}"><i class="fa fa-address-book me-2"></i> Contact patients</a>
            <a href="{{ route('patients.verification') }}"><i class="fa fa-check-circle me-2"></i> Patient
                verification</a>
            <a href="{{ route('organisation.settings') }}"><i class="fa fa-building me-2"></i> Organisation settings</a>
            <a href="{{ route('settings') }}"><i class="fa fa-user-cog me-2"></i> User settings</a>
            <a href="{{ route('help') }}"><i class="fa fa-question-circle me-2"></i> Help</a>
            <hr class="bg-light">
            <a href="{{ route('guided.tour') }}"><i class="fa fa-play-circle me-2"></i> Guided tour</a>
            <a href="{{ route('invite.team') }}"><i class="fa fa-users me-2"></i> Invite your team</a>
            <a href="{{ route('logout') }}"><i class="fa fa-sign-out-alt me-2"></i> Log Out</a>
            <a href="{{ route('report.bug') }}"><i class="fa fa-bug me-2"></i> Report Bug</a>


            <!-- Toggle Dark Mode -->
            <div class="toggle-mode" onclick="toggleDarkMode()">
                <i class="fa fa-moon"></i>
            </div>
        </div>

        <!-- Content -->
        <div class="content w-100">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
