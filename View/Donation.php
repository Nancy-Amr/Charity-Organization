<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Charity Organization</title>
    <meta  name ="description" content = "">
    <meta  name ="viewport" content ="width= device-width, initial scale=1">
    <script src="" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href='../main.css'/>
    <script src='main.js'></script>
    <style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
         margin-bottom: 40px;
  }
  button {
                /* Adjust these properties as desired */
                padding: 10px 20px; /* Adjust padding for button size */
                border: 1px solid #45A049; /* Border color */
                border-radius: 5px; /* Rounded corners */
                font-size: 16px; /* Font size for button text */
                cursor: pointer; /* Change cursor to pointer on hover */
                margin-left: 20px;
              }
              
              /* Optional: Hover effect for all buttons */
              button:hover {
                background-color: #45A049; /* Background color on hover */
              }
              .button-container {
                display: flex; /* Enable flexbox for the container */
                justify-content: center; /* Center buttons horizontally */
              }
  </style>
    </style>
  </head>
  <body>
        <h1>List of all donations</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>Date</td>
            </tr> 
        </div>

      
<?php


include_once "../Controllers/DonationController.php";
$arr=DonationController::handleCommand('Show',null);

for($i=0;$i<count($arr);$i++){
    echo"<tr><td><a href=\"../Controllers/DonationDetailsController.php?Command=Show&Id=".$arr[$i]->Id."\">".$arr[$i]->Id."</a></td><td>".$arr[$i]->date."</td>";
    if (isset($arr[$i]->Id) && !empty($arr[$i]->Id)) {
        echo "<td><a href='EditDonationForm.php?action=edit&id={$arr[$i]->Id}'>Edit</a></td>";
        echo "<td><a href='DeleteDonationForm.php?action=delete&id={$arr[$i]->Id}'>Delete</a></td>";
    }
    echo "</tr>";
}
//"</td><td>".$arr[$i]->recipient."</td><td><a href=UserController.php?DonId=".$arr[$i]->Id.">".$arr[$i]->DonorId."</a>"</td><td>".$arr[$i]->feedback."</td></tr>";
?>

</table>
<div class="button-container">
<button onclick="location.href='../Controllers/DonationDetailsController.php?Command=Add';">Insert New Donation</button><br>
<button onclick="location.href='DonationDetails.php';">View All Donations details</button><br>
<button onclick="location.href='DonationType.php';">View Donation Types</button><br>
<button onclick="location.href='user.php';">View Users</button>
<br><button onclick="location.href='VolunteeringOppurtunity.php';">View Volunteering Oppurtunities</button>
</div>

</body>
</html>
