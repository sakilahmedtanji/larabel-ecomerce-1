<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #0f172a;
    font-family: Arial, sans-serif;
    color: white;
}

.register-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
}

.register-box {
    width: 100%;
    max-width: 420px;
    background: #1e293b;
    padding: 30px;
    border-radius: 10px;
}

.form-label {
    font-size: 14px;
    margin-bottom: 5px;
    color: #cbd5f5;
}

.form-control {
    background: #0f172a;
    border: 1px solid #334155;
    color: white;
}

.form-control:focus {
    border-color: #6366f1;
    box-shadow: none;
}

.btn-register {
    background: #6366f1;
    border: none;
}

.btn-register:hover {
    background: #4f46e5;
}

#error-msg {
    font-size: 13px;
}
</style>
</head>

<body>

<div class="register-wrapper">
    <div class="register-box">

        <h4 class="text-center mb-4">Create Account</h4>

        <form method="POST" action="{{url('/customer/register/store')}}" enctype="multipart/form-data" id="registerForm">
            @csrf

            <!-- Name -->
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control mb-3" required>

            <!-- Email -->
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control mb-3" required>

            <!-- Phone -->
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" class="form-control mb-3" required>

            <!-- Password -->
            <label class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control mb-3" required>

            <!-- Confirm Password -->
            <label class="form-label">Confirm Password</label>
            <input type="password" id="confirm_password" name="password_confirmation" class="form-control mb-1" required>

            <small id="error-msg" class="text-danger d-none">Password does not match</small>

            <!-- Image -->
            <label class="form-label mt-2">Profile Image (Optional)</label>
            <input type="file" name="image" class="form-control mb-3">

            <button type="submit" class="btn btn-register w-100 text-white">Register</button>
        </form>

        <p class="text-center mt-3">
            Already have an account? <a href="/login" class="text-info">Login</a>
        </p>

    </div>
</div>

<script>
const form = document.getElementById("registerForm");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm_password");
const errorMsg = document.getElementById("error-msg");

form.addEventListener("submit", function(e){
    if(password.value !== confirmPassword.value){
        e.preventDefault();
        errorMsg.classList.remove("d-none");
    }
});

confirmPassword.addEventListener("keyup", function(){
    if(password.value === confirmPassword.value){
        errorMsg.classList.add("d-none");
    }
});
</script>

</body>
</html>