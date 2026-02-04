<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave System Login</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
</head>
<body class="container mt-5">      
    

<h3>login</h3>

<form method="POST" action="auth/login.php">
    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
    <button class="btn btn-primary">Login</button>
</form>

</body>
</html>