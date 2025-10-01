<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        /* نفس الاستايل اللي عندك */
        body {
            background: #f8f9fa;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            transition: background 0.5s ease, color 0.5s ease;
        }
        /* ... باقي CSS زي ما هو ... */
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h5>Dashboard</h5>
            <a href="{{ route('dashboard') }}" class="active"><i class="fa fa-home me-2"></i> Dashboard</a>
            <a href="#"><i class="fa fa-bolt me-2"></i> Quick assign</a>
            <a href="#"><i class="fa fa-address-book me-2"></i> Contact patients</a>
            <a href="#"><i class="fa fa-check-circle me-2"></i> Patient verification</a>
            <a href="#"><i class="fa fa-building me-2"></i> Organisation settings</a>
            <a href="#"><i class="fa fa-user-cog me-2"></i> User settings</a>
            <a href="#"><i class="fa fa-question-circle me-2"></i> Help</a>
            <hr class="bg-light">
            <a href="#"><i class="fa fa-play-circle me-2"></i> Guided tour</a>
            <a href="#"><i class="fa fa-users me-2"></i> Invite your team</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt me-2"></i> Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            <a href="#"><i class="fa fa-bug me-2"></i> Report Bug</a>

            <!-- Toggle Dark Mode -->
            <div class="toggle-mode" onclick="toggleDarkMode()">
                <i class="fa fa-moon"></i>
            </div>
        </div>

        <!-- Content -->
        <div class="content w-100">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card-custom text-center">
                        <i class="fa fa-users"></i>
                        <h5>Total Users</h5>
                        <p class="mb-0 fs-4 fw-bold">{{ $usersCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom text-center">
                        <i class="fa fa-chart-line"></i>
                        <h5>Active Sessions</h5>
                        <p class="mb-0 fs-4 fw-bold">{{ $sessionsCount ?? 0 }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-custom text-center">
                        <i class="fa fa-dollar-sign"></i>
                        <h5>Revenue</h5>
                        <p class="mb-0 fs-4 fw-bold">${{ $revenue ?? 0 }}</p>
                    </div>
                </div>
            </div>
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
