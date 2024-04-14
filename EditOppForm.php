<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit oppurtunity Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Edit oppurtunity Information</h2>
    <?php
    include_once "Function.php";
    $obj=new VolunteeringOppurtunity();
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Call function to handle user edit
        $obj->handleOppEdit();
        
        // Redirect to user page after editing
        header("Location: VolunteeringOppurtunity.php");
        exit();
    } else {
        // Retrieve user data if ID is provided
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $OppId = $_GET['id'];
            $filename = $obj->EXmainobj->filename;
            $file = fopen($filename, "r") or die("Unable to open file!");

            // Iterate through each line in the file
            while (!feof($file)) {
                $line = fgets($file);
                $OppData = explode("~", $line);

                if (!empty($OppData) && $OppData[0] == $OppId) {
                    list($Id ,$title, $volunteer, $location,$Date) = $OppData;
    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $Id; ?>">

                        Id: <input type="text" name="Id" value="<?php echo $Id; ?>"><br>
                        title: <input type="text" name="title" value="<?php echo $title; ?>"><br>
                        volunteer: <input type="text" name="volunteer" value="<?php echo $volunteer; ?>"><br>
                        location: <input type="text" name="location" value="<?php echo $location; ?>"><br>
                        Date: <input type="text" name="date" value="<?php echo $Date; ?>"><br>
                       
                        

                        <input type="submit" name="edit" value="Save Changes">
                    </form>
    <?php
                    break;
                }
            }
            fclose($file);
        } else {
            echo "Oppurtunity ID not provided.";
        }
    }
    ?>
</body>
</html>
