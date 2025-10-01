<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
   body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url("{{ asset('images/bg.jpg') }}") no-repeat center center;
    background-size: cover;
    color: #fff;
}

.login-card {
    width: 320px;
    text-align: center;
}

/* اللوجو */
.login-card .logo {
    font-size: 70px;
    margin-bottom: 30px;
    color: #fff;
}

/* input field */
.input-group {
    position: relative;
    margin-bottom: 20px;

}

.input-group input {
    width: 100%;
    height: 45px;
    border: 1px solid #fff;        /* حدود بيضاء */
    border-radius: 4px;
    background-color: transparent; /* الخلفية شفاف */
    color: #fff;                   /* النص أبيض */
    font-size: 14px;
    padding-left: 40px;            /* مسافة للأيقونة */
    outline: none;
    text-transform: uppercase;
    box-shadow: none;              /* إزالة أي ظل افتراضي */
    -webkit-background-clip: text; /* في بعض المتصفحات */
}
.input-group input:focus {
    border-color: #ddd;            /* لون أفتح عند الفوكس */
}
.input-group input::placeholder {
    color: rgba(255, 255, 255, 0.6); /* placeholder فاتح */
}
.input-group input{
    color: #fff;
}
.input-group i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #fff;
    font-size: 16px;
}

/* زر login */
.login-btn {
    width: 100%;
    height: 45px;
    background: #fff;
    color: #2148C0;
    font-weight: 600;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    text-transform: uppercase;
    cursor: pointer;
    margin-top: 10px;
    box-shadow: 0px 4px 4px rgba(0,0,0,0.3);
    transition: 0.3s;
}

.login-btn:hover {
    background: #f2f2f2;
}

/* Forgot password */
.extra-links {
    margin-top: 15px;
}

.extra-links a {
    color: #fff;
    font-size: 14px;
    text-decoration: none;
}

.extra-links a:hover {
    text-decoration: underline;
}

/* رسائل الأخطاء */
.alert-error {
    background: #ff4d4d;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 14px;
    text-align: left;
}

.alert-success {
    background: #28a745;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 15px;
    font-size: 14px;
    text-align: left;
}
</style>
</head>

<body>
    <div class="login-card">

    {{-- Errors --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul style="list-style:none; margin:0; padding:0;">
                @foreach ($errors->all() as $error)
                    <li>⚠ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Status Message --}}
    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="login-card">
    <!-- أيقونة كعربة تسوق -->
    <div class="logo">
        <i class="fa-solid fa-cart-arrow-down"></i>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="input-group">
            <i class="fa-solid fa-user"></i>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="email">
        </div>

        <div class="input-group">
            <i class="fa-solid fa-lock"></i>
            <input id="password" type="password" name="password" required placeholder="Password">
        </div>

        <button type="submit" class="login-btn">Login</button>

        <div class="extra-links">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot password?</a>
            @endif
        </div>
    </form>
</div>
