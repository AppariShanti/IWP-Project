<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="stylesheet" href="style_login.css"/>
</head>
<body>
    <div class="register-bar">
        <h2>Sign In</h2>
    </div>
    <form method="POST" action="index.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_l">
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn">Log In</button>
        </div>
        <p>
            Don't Have an Account? <a href="register.php">Sign Up</a>
        </p>
    </form>
</body>
</html>