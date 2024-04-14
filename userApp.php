<?php
// Check if the user's name is provided in the URL query parameters
if (isset($_GET['Username'])) {
    // Get the user's name from the query parameters
    $userName = $_GET['Username'];
    // Display the welcome message with the user's name
    echo "Welcome, $userName!";
}

?>
