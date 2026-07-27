```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Outfit',sans-serif;
        }

        body{
            min-height:100vh;
            background:#0f172a;
            overflow:hidden;
        }

        .wrapper{
            display:flex;
            min-height:100vh;
        }

        .left-panel{
            width:50%;
            position:relative;
            background:linear-gradient(135deg,#4f46e5,#7c3aed);
            display:flex;
            align-items:center;
            justify-content:center;
            padding:60px;
            overflow:hidden;
        }

        .left-panel::before,
        .left-panel::after{
            content:'';
            position:absolute;
            border-radius:50%;
            filter:blur(80px);
        }

        .left-panel::before{
            width:250px;
            height:250px;
            background:rgba(255,255,255,.2);
            top:-50px;
            left:-50px;
        }

        .left-panel::after{
            width:350px;
            height:350px;
            background:rgba(255,255,255,.12);
            bottom:-100px;
            right:-100px;
        }

        .brand-content{
            color:#fff;
            z-index:1;
            max-width:420px;
        }

        .brand-content h1{
            font-size:3rem;
            font-weight:700;
            margin-bottom:20px;
        }

        .brand-content p{
            font-size:1rem;
            line-height:1.8;
            opacity:.9;
        }

        .right-panel{
            width:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:30px;
            background:#020617;
        }

        .login-box{
            width:100%;
            max-width:420px;
        }

        .back-link{
            display:inline-block;
            color:#94a3b8;
            text-decoration:none;
            margin-bottom:30px;
        }

        .back-link:hover{
            color:#fff;
        }

        .login-box h2{
            color:#fff;
            font-size:2rem;
            font-weight:700;
            margin-bottom:10px;
        }

        .login-box p{
            color:#94a3b8;
            margin-bottom:30px;
        }

        .form-control{
            background:#0f172a;
            border:1px solid #1e293b;
            color:#fff;
            height:55px;
            border-radius:14px;
            padding:0 18px;
        }

        .form-control:focus{
            background:#0f172a;
            color:#fff;
            border-color:#6366f1;
            box-shadow:0 0 0 .25rem rgba(99,102,241,.15);
        }

        .form-label{
            color:#cbd5e1;
            margin-bottom:8px;
        }

        .btn-login{
            width:100%;
            height:55px;
            border:none;
            border-radius:14px;
            background:linear-gradient(135deg,#6366f1,#8b5cf6);
            color:#fff;
            font-weight:600;
            margin-top:10px;
            transition:.3s;
        }

        .btn-login:hover{
            transform:translateY(-2px);
            box-shadow:0 15px 30px rgba(99,102,241,.3);
        }

        .bottom-text{
            text-align:center;
            color:#94a3b8;
            margin-top:25px;
        }

        .bottom-text a{
            color:#8b5cf6;
            text-decoration:none;
            font-weight:600;
        }

        @media(max-width:992px){

            .left-panel{
                display:none;
            }

            .right-panel{
                width:100%;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">

    <div class="left-panel">
        <div class="brand-content">
            <h1>Welcome Back!</h1>
            <p>
                Sign in to access your account, track orders, manage your profile
                and enjoy a seamless shopping experience.
            </p>
        </div>
    </div>

    <div class="right-panel">

        <div class="login-box">

            <a href="/" class="back-link">← Back to Home</a>

            <h2>Sign In</h2>
            <p>Enter your email and password to continue.</p>

            <form id="loginForm" method="POST" action="{{ url('/customer/loginauth') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>

                <button type="submit" class="btn-login" id="submitBtn">
                    Sign In
                </button>
            </form>

            <div class="bottom-text">
                Don't have an account?
                <a href="{{ url('/customer/register') }}">Create Account</a>
            </div>

        </div>

    </div>

</div>

<script>
    const loginForm = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');

    loginForm.addEventListener('submit', function() {
        submitBtn.disabled = true;
        submitBtn.innerHTML =
            '<span class="spinner-border spinner-border-sm"></span> Signing In...';
    });
</script>

</body>
</html>
```
