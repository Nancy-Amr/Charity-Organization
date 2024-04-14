<?php

if (isset($_GET['Username'])) {
    
    $userName = $_GET['Username'];
    
    echo "Welcome, $userName!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    
    <p><a href="user.php">User Management</a></p>
</body>
</html>
