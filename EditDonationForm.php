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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj->handleDonationEdit();
        
        header("Location: Donation.php");
        exit();
    } else {
        if (isset($_GET['id']) && $_GET['id'] !== '') {
            $DonationId = $_GET['id'];
            $filename = $obj->mainobj->filename;
            $file = fopen($filename, "r") or die("Unable to open file!");

            while (!feof($file)) {
                $line = fgets($file);
                $DonationData = explode("~", $line);

                if (!empty($DonationData) && $DonationData[0] == $DonationId) {
                    list($id,$Date, $RecipientId, $DonorId, $feedback,$time,$rating) = $DonationData;
    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        DonorId: <input type="text" name="DonorId" value="<?php echo $DonorId; ?>"><br>
                        Date: <input type="text" name="Date" value="<?php echo $Date; ?>"><br>
                        RecipientId: <input type="text" name="RecipientId" value="<?php echo $RecipientId; ?>"><br>
                        Feedback: <input type="text" name="Feedback" value="<?php echo $feedback; ?>"><br>
                        Rating: <input type="text" name="Rating" value="<?php echo $rating; ?>"><br>
                        <input type="hidden" name="time" value="<?php echo $time; ?>">
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
