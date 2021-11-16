<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style_login.css"/>
</head>
<body>
    <div class="register-bar">
        <h2>Sign Up</h2>
    </div>
    <form method="POST" action="register.php">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username;?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email;?>">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" >
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="cnf-password" >
        </div>
        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button>
        </div>
        <p>
            Already have an Account? <a href="login.php">Sign In</a>
        </p>
    </form>
</body>
</html>