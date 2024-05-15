<?php
class GenerateDonationForm {
    function generateDonationForm() {
        include_once"../Models/DonationType/DonationTypeClass.php";
        $type=new DonationType();
        $types=$type->Listall();

      echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Info Insertion</title>
    <meta name="description" content="Donation insertion">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../form.css">


</head>
<body>
<h1>Please insert donation info:</h1>
<form action="../Controllers/DonationDetailsController.php?Command=Add" method="POST">
        <table>
            <tr>
                <td>DonorId:</td>
                <td><input type="text" name="DonorId"></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><input type="date" name="Date"></td>
            </tr>
            <tr>
                <td>RecipientId:</td>
                <td><input type="text" name="RecipientId"></td>
            </tr>
            <tr>
                <td>Feedback (if you would like to provide one!):</td>
                <td><input type="text" name="Feedback"></td>
            </tr>
            <tr>
                <td>Donation Type:</td>
                <td>
                    <select name="DonationTypeId">';
                        foreach ($types as $donationType) {
                            echo "<option value='" . $donationType->Id . "'>" . $donationType->type . "</option>";
                        }
                    
                  echo'</select>
                </td>
            </tr>
            <tr>
                <td>Rating:</td>
                <td>
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
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit"></td>
            </tr>
        </table>
    </form>
    </table>
    </body>
    </html>';
                    }
                }


       
?>
