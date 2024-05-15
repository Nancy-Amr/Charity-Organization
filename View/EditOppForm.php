<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit oppurtunity Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <h2>Edit oppurtunity Information</h2>
    <?php
    include_once "../Models/VolunteeringOpp/VolunteeringOppClass.php";
    $obj=new VolunteeringOppurtunity();
   
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $OppId = $_GET['id'];
            $filename = $obj->EXmainobj->filename;
            $file = fopen($filename, "r") or die("Unable to open file!");

            // Iterate through each line in the file
            while (!feof($file)) {
                $line = fgets($file);
                $OppData = explode($obj->EXmainobj->separator, $line);

                if (!empty($OppData) && $OppData[0] == $OppId) {
                    list($Id ,$title, $volunteer, $location,$Date) = $OppData;
    ?>
                    <form action="../Controllers/VolunteeringOppController.php?Command=Edit" method="POST">
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
    ?>
</body>
</html>
