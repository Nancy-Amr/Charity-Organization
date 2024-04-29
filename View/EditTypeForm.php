<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User Types</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Edit User Types</h2>
    <?php
    include_once "../Models/UserType/UserTypeClass.php";
    $obj=new UserType();
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Call function to handle user edit
       $obj-> handleTypeEdit();
        
        // Redirect to user page after editing
        header("Location:user.php");
        exit();
    } else {
        // Retrieve user data if ID is provided
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $userId = $_GET['id'];
            $filename = $obj->UTmainobj->filename;
            $file = fopen($filename, "r") or die("Unable to open file!");

            // Iterate through each line in the file
            while (!feof($file)) {
                $line = fgets($file);
                $usertype = explode($obj->UTmainobj->separator, $line);

                if (!empty($usertype) && $usertype[0] == $userId) {
                    list($id, $type) = $usertype;
    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        
                        Type: <input type="text" name="Type" value="<?php echo $type; ?>"><br>

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
