<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(10px);
      padding: 30px;
      border-radius: 15px;
      width: 350px;
      color: white;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }
    .card h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .input-group {
      margin-bottom: 15px;
    }
    .input-group label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
    }
    .input-group input {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
    }
    .actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 15px;
    }
    .actions a {
      font-size: 13px;
      color: #ddd;
      text-decoration: none;
    }
    .actions a:hover {
      text-decoration: underline;
    }
    .btn {
      background: rgba(255,255,255,0.3);
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      color: white;
      font-weight: bold;
      transition: background 0.3s;
    }
    .btn:hover {
      background: rgba(255,255,255,0.5);
    }
    .terms {
      font-size: 13px;
      margin: 10px 0;
    }
    .terms a {
      color: #ffeb3b;
      text-decoration: none;
    }
    .terms a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>Create an Account</h2>
    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="input-group">
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required placeholder="Your full name">
      </div>

      <div class="input-group">
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required placeholder="example@mail.com">
      </div>

      <div class="input-group">
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required placeholder="********">
      </div>

      <div class="input-group">
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="********">
      </div>

      <div class="terms">
        <input type="checkbox" id="terms" required>
        <label for="terms">
          I agree to the <a href="{{ route('terms.show') }}" target="_blank">Terms</a> and
          <a href="{{ route('policy.show') }}" target="_blank">Privacy Policy</a>.
        </label>
      </div>

      <div class="actions">
        <a href="{{ route('login') }}">Already registered?</a>
        <button type="submit" class="btn">Register</button>
      </div>
    </form>
  </div>

</body>
</html>
