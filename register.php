<?php
$registration_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $phoneNumber = $_POST["phone_number"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Read the user type from the userT.txt file
    $user_type_file = "userT.txt";
    $user_type_data = file($user_type_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $user_type = "4"; // Default to "registered" user type (ID 4)
    if (!empty($user_type_data)) {
        $user_type = explode("~", end($user_type_data))[0];
    }

    // Read the last user ID from the file and increment it by one
    $filename = "user.txt";
    // Default value if no users exist yet
    $last_user_id = 0; 

    // Read the entire file into an array
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Check if the file is not empty
    if (!empty($lines)) {
        // Get the last line from the array
        $last_line = end($lines);

        // Extract the user ID from the last line
        $last_user_data = explode("~", $last_line);
        $last_user_id = intval($last_user_data[0]);

        /* //debugging id not being incremented
        echo "Last Line: $last_line<br>";
        echo "Last User ID: $last_user_id<br>";*/
    }

    // Increment the user ID
    $user_id = $last_user_id + 1;


    // Store the user data in the file
    $data = $user_id . '~' . $username . '~' . $phoneNumber . '~' . $address . '~' . $email . '~' . $hashed_password . '~' . $user_type . PHP_EOL;
    file_put_contents($filename, $data, FILE_APPEND);

    $registration_success = true;
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <?php if ($registration_success): ?>
        <p>User registered successfully!</p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php"><button>Back to Home</button></a>
        </div>
    <?php else: ?>
        <h2>Register</h2> <br>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="phone_number">Phone Number:</label><br>
            <input type="text" id="phone_number" name="phone_number" required><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Register">
        </form>
    <?php endif; ?>
</body>
</html>
