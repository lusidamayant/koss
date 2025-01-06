<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('asset/background.jpg') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        .blur-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            background-size: cover;
            filter: blur(10px); /* Membuat blur lebih halus */
            z-index: -1;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Mengurangi bayangan agar lebih soft */
            width: 380px; /* Membuat lebar sedikit lebih kecil */
            text-align: center;
            position: relative;
            z-index: 1;
        }
        .login-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
        .login-container input[type="email"], 
        .login-container input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 10px;
            transition: border 0.3s ease;
            background-color: #f9f9f9;
        }
        .login-container input[type="email"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #D0B8A8;
            background-color: #fff;
        }
        .login-container .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px; /* Sedikit memperkecil teks */
        }
        .login-container .remember-me input {
            margin-right: 10px;
        }
        .login-container button {
            width: 100%;
            padding: 15px;
            background-color: #646565;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(208, 184, 168, 0.4);
        }
        .login-container button:hover {
            background-color: #215a51;
            box-shadow: 0 8px 20px rgba(208, 184, 168, 0.6);
        }
        .login-container .separator {
            margin: 20px 0;
            position: relative;
            text-align: center;
        }
        .login-container .separator:before,
        .login-container .separator:after {
            content: "";
            position: absolute;
            width: 40%;
            height: 1px;
            background-color: #ddd;
            top: 50%;
        }
        .login-container .separator:before {
            left: 0;
        }
        .login-container .separator:after {
            right: 0;
        }
        .login-container .separator span {
            padding: 0 10px;
            background-color: rgba(255, 255, 255, 0.95); 
            color: #555;
            position: relative;
            z-index: 1; 
        }
        .login-container .social-icons {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
        }
        .login-container .social-icons img {
            width: 40px; 
            height: 40px;
            object-fit: cover; 
            border-radius: 50%;
            transition: transform 0.3s ease;
        }
        .login-container .social-icons img:hover {
            transform: scale(1.1);
        }
        .login-container p {
            color: #555;
            font-size: 14px;
        }
        .login-container a {
            color: #646565;
            text-decoration: none;
            font-weight: bold;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="blur-background"></div>
    
    <div class="login-container">
        @if (session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif
        
        <h2>Sign In</h2>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <div class="remember-me">
                <input type="checkbox" id="remember-me" name="remember-me">
                <label for="remember-me">Remember me</label>
            </div>
            <button type="submit">Login</button>
        </form>
        {{-- <div class="separator"><span>or sign up with</span></div> --}}
        {{-- <div class="social-icons">
            <img src="asset/ggogle-removebg-preview.png" alt="Google">
            <img src="asset/logoiphone-removebg-preview.png" alt="Apple">
            <img src="asset/facebook-removebg-preview.png" alt="Facebook">
        </div> --}}
        <br>
        <p>Don't have an account? <a href="{{ route('register.index') }}">Sign Up</a></p>
    </div>
</body>
</html>
