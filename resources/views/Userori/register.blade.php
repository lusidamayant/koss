

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            filter: blur(8px);
            z-index: -1;
        }
        .register-container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
            position: relative;
            z-index: 1;
        }
        .register-container h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }
        .register-container input[type="text"], 
        .register-container input[type="email"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 10px;
            transition: border 0.3s ease;
            background-color: #f9f9f9;
        }
        .register-container input[type="text"]:focus,
        .register-container input[type="email"]:focus,
        .register-container input[type="password"]:focus {
            border-color: #D0B8A8;
            background-color: #fff;
        }
        .register-container button {
            width: 100%;
            padding: 15px;
            background-color: #D0B8A8;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(155, 89, 182, 0.4);
        }
        .register-container button:hover {
            background-color: #D0B8A8;
            box-shadow: 0 8px 20px rgba(155, 89, 182, 0.6);
        }
        .register-container p {
            margin-top: 20px;
            color: #555;
        }
        .register-container a {
            color: #D0B8A8;
            text-decoration: none;
            font-weight: bold;
        }
        .register-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="blur-background"></div>

    <div class="register-container">
        <h2>Create an Account</h2>
        <form action="{{ url('register') }}" method="POST">
            @csrf
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        
        <p>Already have an account? <a href="{{ url('/login') }}">Sign In</a></p>
    </div>
</body>
</html>
