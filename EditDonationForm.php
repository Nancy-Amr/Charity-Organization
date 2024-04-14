<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Donation Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Edit Donation Information</h2>
    <?php
    include_once "Function.php";
    $obj=new DonationDetails();
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Call function to handle user edit
        $obj->handleDonationEdit();
        
        // Redirect to user page after editing
        header("Location: Donation.php");
        exit();
    } else {
        // Retrieve user data if ID is provided
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $DonationId = $_GET['id'];
            $filename = $obj->mainobj->filename;
            $file = fopen($filename, "r") or die("Unable to open file!");

            // Iterate through each line in the file
            while (!feof($file)) {
                $line = fgets($file);
                $DonationData = explode("~", $line);

                if (!empty($DonationData) && $DonationData[0] == $DonationId) {
                    list($id,$Date, $RecipientId, $DonorId, $Feedback,$time) = $DonationData;
    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo obj->$id; ?>">
                        DonorId: <input type="text" name="DonorId" value="<?php echo $obj->$DonorId; ?>"><br>
                        Date: <input type="text" name="Date" value="<?php echo $obj->$Date; ?>"><br>
                        RecipientId: <input type="text" name="RecipientId" value="<?php echo $obj->$RecipientId; ?>"><br>
                        Feedback: <input type="text" name="Feedback" value="<?php echo $obj->$Feedback; ?>"><br>
                        <input type="hidden" name="time" value="<?php echo obj->$time; ?>">
                        <input type="submit" name="edit" value="Save Changes">
                    </form>
    <?php
                    break;
                }
            }
            fclose($file);
        } else {
            echo "Donation ID not provided.";
        }
    }
    ?>
</body>
</html>
