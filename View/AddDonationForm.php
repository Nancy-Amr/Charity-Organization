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
    <style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
    }
    .rating input[type="radio"] {
        display: none;
    }
    .rating label {
        cursor: pointer;
        font-size: 45px;
        color: #ddd;
    }
    .rating input[type="radio"]:checked ~ label {
        color: gold;
    }
    body {
        font-family: Arial, sans-serif; /* Set a base font family */
        margin: 0; /* Remove default margin from body */
        padding: 20px; /* Add some padding for better layout */
        color:   #45A049;
        background-color:#F0E6D2 ;
      }
      
      h1 {
        text-align: center; /* Center align the heading */
        margin-bottom: 20px; /* Add some space below the heading */
      }
      
      form {
        width: 400px; /* Set a width for the form */
        margin: 0 auto; /* Center the form horizontally */
        border: 1px solid #ccc; /* Add a thin border */
        padding: 20px; /* Add some padding within the form */
        border-radius: 5px; /* Add rounded corners for a nicer look */
        color:   #45A049;
 }
      
      label {
        display: block; /* Make labels appear on separate lines */
        margin-bottom: 5px; /* Add some space below labels */
      }
      
      input[type="text"],
      input[type="email"],
      input[type="tel"] {
        width: 100%; /* Make input fields full width */
        padding: 10px; /* Add padding for better user input */
        border: 1px solid #ccc; /* Add a thin border */
        border-radius: 3px; /* Add rounded corners */
        box-sizing: border-box; /* Include padding within input width */
      }
      
      .address { /* Optional styling for address field if using rows */
        height: 80px; /* Adjust height as needed */
      }
      
      input[type="submit"] {
        background-color: #4CAF50; /* Green color for submit button */
        color: white; /* White text color */
        padding: 10px 10px; /* Add padding for the button */
        border: none; /* Remove default button border */
        border-radius: 5px; /* Add rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
      }
      
      input[type="submit"]:hover {
        background-color: #45A049; /* Darker green on hover */
      }
</style>


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
