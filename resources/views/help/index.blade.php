@extends('layouts.app')

@section('content')
<div class="container py-5">

    <!-- صفحة بخلفية متدرجة -->
    <div class="help-background p-5 rounded-4">
        <h1 class="text-center text-white mb-5">Help Center</h1>

        <div class="row g-4">

            <!-- Card 1: FAQs -->
            <div class="col-md-6 col-lg-4">
                <div class="card glass-card p-3 h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-white">FAQs</h5>
                        <p class="card-text text-white-50">Find answers to frequently asked questions about using the platform.</p>
                        <a href="#" class="btn btn-glass">View FAQs</a>
                    </div>
                </div>
            </div>

            <!-- Card 2: User Guide -->
            <div class="col-md-6 col-lg-4">
                <div class="card glass-card p-3 h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-white">User Guide</h5>
                        <p class="card-text text-white-50">Step-by-step instructions to get the most out of your account.</p>
                        <a href="#" class="btn btn-glass">Open Guide</a>
                    </div>
                </div>
            </div>

            <!-- Card 3: Contact Support -->
            <div class="col-md-6 col-lg-4">
                <div class="card glass-card p-3 h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-white">Contact Support</h5>
                        <p class="card-text text-white-50">Get in touch with our support team for any questions or issues.</p>
                        <a href="mailto:support@example.com" class="btn btn-glass">Contact Now</a>
                    </div>
                </div>
            </div>

            <!-- Card 4: Video Tutorials -->
            <div class="col-md-6 col-lg-4">
                <div class="card glass-card p-3 h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-white">Video Tutorials</h5>
                        <p class="card-text text-white-50">Watch video tutorials to learn platform features quickly.</p>
                        <a href="#" class="btn btn-glass">Watch Videos</a>
                    </div>
                </div>
            </div>

            <!-- Card 5: Community -->
            <div class="col-md-6 col-lg-4">
                <div class="card glass-card p-3 h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-white">Community Forum</h5>
                        <p class="card-text text-white-50">Join discussions with other users and share knowledge.</p>
                        <a href="#" class="btn btn-glass">Join Forum</a>
                    </div>
                </div>
            </div>

            <!-- Card 6: Feedback -->
            <div class="col-md-6 col-lg-4">
                <div class="card glass-card p-3 h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-white">Feedback</h5>
                        <p class="card-text text-white-50">Help us improve by sending your feedback and suggestions.</p>
                        <a href="#" class="btn btn-glass">Send Feedback</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<style>
/* الخلفية المتدرجة */
.help-background {
    background: linear-gradient(135deg, #667eea, #764ba2, #43cea2, #185a9d);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    padding: 3rem;
    border-radius: 2rem;
}

/* حركة الخلفية */
@keyframes gradientBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* تصميم زجاجي للكروت */
.glass-card {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 1.5rem;
    transition: transform 0.3s, box-shadow 0.3s;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
}

/* زر زجاجي */
.btn-glass {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 0.75rem;
    transition: all 0.3s;
}

.btn-glass:hover {
    background: rgba(255, 255, 255, 0.35);
    color: white;
    transform: translateY(-2px);
}
</style>
@endsection
