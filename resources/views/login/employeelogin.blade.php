<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.login-container{
    background:#fff;
    padding:40px;
    border-radius:12px;
    width:350px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    text-align:center;
}

.login-container h2{
    margin-bottom:10px;
    color:#333;
}

.login-container p{
    margin-bottom:25px;
    color:#777;
}

.input-group{
    margin-bottom:20px;
    text-align:left;
}

.input-group label{
    font-size:14px;
    color:#555;
}

.input-group input{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:6px;
    outline:none;
    transition:0.3s;
}

.input-group input:focus{
    border-color:#667eea;
}

.btn{
    width:100%;
    padding:12px;
    background:#667eea;
    border:none;
    color:#fff;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#5a67d8;
}

.footer{
    margin-top:15px;
    font-size:13px;
}

.footer a{
    text-decoration:none;
    color:#667eea;
}
</style>

</head>
<body>

<div class="login-container">
    <h2>Employee Login</h2>
    <p>Please login to continue</p>

    <form action="{{ url('/employee/loginauth') }}" method="POST">
        <!-- Laravel use করলে এটা লাগবে -->
        @csrf

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter email" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn">Login</button>
    </form>

    <div class="footer">
        <a href="#">Forgot Password?</a>
    </div>
</div>

</body>
</html>