<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Charity Organization</title>
<style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
  }
  </style>
</head>
  <body>
        <h1>Donation Details</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Recipient ID</td>
                    <td>Donor Info</td>
                    <td>feedback</td> 
                    <td>Rating</td> 
            </tr> 
        </div>
<?php
include_once"Function.php";
$obj=new DonationDetails();
$don=$obj->getDonationDetById($_GET["Id"]);

    echo"<tr><td>".$don->Id."</td><td>".$don->date."</td><td>".$don->time."</td><td>".$don->recipient."</td><td><a href=UserController.php?DonId=".$don->Id.">".$don->DonorId."</a></td><td>".$don->feedback."</td><td>".$don->Rating."</td>";
    if (isset($don->Id) && !empty($don->Id)) {
      echo "<td><a href='EditDonationForm.php?action=edit&id={$don->Id}'>Edit</a></td>";
      echo "<td><a href='DeleteDonationForm.php?action=delete&id={$don->Id}'>Delete</a></td>";
  
    "</tr>";
}
?>
</table>
<button onclick="history.back()">Go Back</button>

</body>
</html>
