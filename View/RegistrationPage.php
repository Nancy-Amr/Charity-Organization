<?php
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $formData = isset($_SESSION['formData']) ? $_SESSION['formData'] : array();
    $errorMessage = isset($_SESSION['errorMessage']) ? $_SESSION['errorMessage'] : "";
    unset($_SESSION['formData']);
    unset($_SESSION['errorMessage']);
    $registration_success = isset($_SESSION['registration_success']) ? $_SESSION['registration_success'] : "";
    unset($_SESSION['registration_success']);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../register.css">
</head>
<h1>Register</h1>
<body>
    <?php if ($registration_success): ?>
        <p>User registered successfully!</p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="../index.php"><button>Back to Home</button></a>
        </div>
    <?php else: ?>
        
        <form method="post" action="../register.php">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" required><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <label for="confirmPassword">Confirm Password:</label><br>
            <input type="password" id="confirmPassword" name="confirmPassword" required><br><br><br>
            <input type="submit" value="Register">
        </form>
    <?php 
    if (!empty($errorMessage)) {
        echo '<p>' . $errorMessage . '</p>';
    }
endif; 
    ?>
</body>
</html>