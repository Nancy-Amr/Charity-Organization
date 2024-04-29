<?php
include_once"../Models/DonationType/DonationTypeClass.php";
$type=new DonationType();
$types=$type->ListallDonationTypes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Donation Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Donation insertion">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
    <style>
  .rating {
        display: flex;
        align-items: center;
    }
    .rating input[type="radio"] {
        display: none;
        margin-right: 10px;
    }
    .rating label {
        cursor: pointer;
        font-size: 45px;
        color: #ddd;
    }
    .rating input[type="radio"]:checked ~ label {
        color: gold;
    }

</style>
</head>
<body>
    <h2>Edit Donation Information</h2>
    <?php
    include_once "../Models/DonationDetails/DonationDetailsClass.php";
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
                        <div class="rating">
                        <input type="radio" id="star5" name="Rating" value="5 stars" />
                        <label for="star5">☆</label>
                        <input type="radio" id="star4" name="Rating" value="4 stars" />
                        <label for="star4">☆</label>
                        <input type="radio" id="star3" name="Rating" value="3 stars" />
                        <label for="star3">☆</label>
                        <input type="radio" id="star2" name="Rating" value="2 stars" />
                        <label for="star2">☆</label>
                        <input type="radio" id="star1" name="Rating" value="1 stars" />
                        <label for="star1">☆</label>
                    </div>
                        Donation Type:
                        <select name="DonationTypeId">
                            <?php
                            foreach ($types as $donationType) {
                                $selected = ($donationType->Id == $DonationTypeId) ? 'selected' : '';
                                echo "<option value='" . $donationType->Id . "' $selected>" . $donationType->type . "</option>";
                            }
                            ?>
                        </select><br>
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
