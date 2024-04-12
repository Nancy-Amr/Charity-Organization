<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Edit User Information</h2>
    <?php
    include_once "Function.php";

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Call function to handle user edit
        handleUserEdit();
        
        // Redirect to user page after editing
        header("Location: user.php");
        exit();
    } else {
        // Retrieve user data if ID is provided
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $userId = $_GET['id'];
            $filename = "user.txt";
            $file = fopen($filename, "r") or die("Unable to open file!");

            // Iterate through each line in the file
            while (!feof($file)) {
                $line = fgets($file);
                $userData = explode("~", $line);

                if (!empty($userData) && $userData[0] == $userId) {
                    list($id, $username, $phone, $address, $email) = $userData;
    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        Username: <input type="text" name="Username" value="<?php echo $username; ?>"><br>
                        Phone: <input type="text" name="Phone" value="<?php echo $phone; ?>"><br>
                        Address: <input type="text" name="Address" value="<?php echo $address; ?>"><br>
                        Email: <input type="text" name="Email" value="<?php echo $email; ?>"><br>
                        <input type="submit" name="edit" value="Save Changes">
                    </form>
    <?php
                    break;
                }
            }
            fclose($file);
        } else {
            echo "User ID not provided.";
        }
    }
    ?>
</body>
</html>
