<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Donation Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Edit Donation Type Information</h2>
    <?php
    include_once "../Models/DonationType/DonationTypeClass.php";
    $obj=new DonationType();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $obj->handleDonationTypeEdit();
        
        header("Location: DonationType.php");
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
                    list($id,$type,$description) = $DonationData;
    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        Type: <input type="text" name="Type" value="<?php echo $type; ?>"><br>
                        Description: <input type="text" name="Description" value="<?php echo $description; ?>"><br>
                        
                        <input type="submit" name="edit" value="Save Changes">
                    </form>
    <?php
                    break;
                }
            }
            fclose($file);
        } else {
            echo "Donation Type ID not provided.";
        }
    }
    ?>
</body>
</html>
