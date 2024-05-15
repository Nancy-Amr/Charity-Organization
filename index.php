<?php
session_start();
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">

   
</head>
<body>
<h2 style="text-align: center;">Login</h2>
    <form action="login.php" method="post">
        <!-- <label >ID:</label>
        <input type="text" id="id" name="id" required><br><br> -->
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label >Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label >Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <div style="text-align: center; margin-top: 20px;">
        <a href="register.php"><button>Register</button></a>
    </div>
</body>
</html>

