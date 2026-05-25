<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #a29bfe;
            --bg-dark: #0a0a0b;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            background-color: var(--bg-dark);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            color: #fff;
            background-image: radial-gradient(circle at 10% 20%, rgba(108, 92, 231, 0.05) 0%, transparent 40%),
                              radial-gradient(circle at 90% 80%, rgba(162, 155, 254, 0.05) 0%, transparent 40%);
        }

        .home-btn {
            position: absolute;
            top: 25px;
            left: 25px;
            color: #aaa;
            text-decoration: none;
            font-size: 0.9rem;
            border: 1px solid var(--border-color);
            padding: 8px 18px;
            border-radius: 50px;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .home-btn:hover {
            background: #fff;
            color: #000;
            transform: translateX(5px);
        }

        .login-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 45px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        h2 {
            font-weight: 600;
            margin-bottom: 8px;
            text-align: center;
            background: linear-gradient(to right, #fff, #888);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.subtitle {
            text-align: center;
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 30px;
        }

        .form-label {
            font-size: 0.8rem;
            color: #aaa;
            margin-left: 5px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid var(--border-color);
            color: #fff;
            border-radius: 12px;
            padding: 12px 15px;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.07);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(108, 92, 231, 0.1);
            color: #fff;
        }

        .btn-signin {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 12px;
            padding: 12px;
            color: #fff;
            font-weight: 600;
            width: 100%;
            margin-top: 15px;
            transition: 0.3s;
            box-shadow: 0 10px 20px -5px rgba(108, 92, 231, 0.4);
        }

        .btn-signin:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
            box-shadow: 0 15px 25px -5px rgba(108, 92, 231, 0.5);
        }

        .bottom-links {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            font-size: 0.82rem;
        }

        .bottom-links a {
            color: #888;
            text-decoration: none;
            transition: 0.3s;
        }

        .bottom-links a:hover {
            color: var(--primary-color);
        }

        .register-link {
            color: var(--secondary-color) !important;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <a href="/" class="home-btn">← Back to Home</a>

    <div class="login-card">
        <h2>Welcome Back</h2>
        <p class="subtitle">Please enter your details to sign in</p>

        <form id="loginForm" method="POST" action="{{url('/customer/loginauth')}}">
            
           @csrf

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-signin" id="submitBtn">Sign In</button>
        </form>

        <div class="bottom-links">
            <a href="/forgot-password">Forgot Password?</a>
            <span>New here? <a href="{{url('/customer/register')}}" class="register-link">Create Account</a></span>
        </div>
    </div>

    <!-- JS -->
    <script>
        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');

        loginForm.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Checking...';
        });
    </script>

</body>
</html>