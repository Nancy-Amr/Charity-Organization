<?php
include_once"../Models/DonationDetails/DonationDetailsClass.php";
include_once"../Models/DonationType/DonationTypeClass.php";
$obj=new DonationDetails();
//$don=$obj->getDonationDetById($_GET["Id"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>All Donation Details</title>
    <meta  name ="description" content = "">
    <meta  name ="viewport" content ="width= device-width, initial scale=1">
    <script src="" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href='../main.css'/>
    <script src='main.js'></script>
    <style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;}
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
        <h1>Donation Details</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>Type</td>
                    <td>Date</td>
                    <td>Time</td>
                    <td>Recipient ID</td>
                    <td>Donor Id</td>
                    <td>feedback</td> 
                    <td>Rating</td> 
            </tr> 
        </div>

      
<?php
$type=new DonationType();
$arr=[];
$arr=$obj->ListallDonationDetails();
for($i=0;$i<count($arr);$i++){
  $t=$type->getDonationTypeById($arr[$i]->TypeId);
    echo"<tr><td>".$arr[$i]->Id."</td><td><a href=\"../Controllers/DonationTypeController.php?Command=Show&DonId=".$arr[$i]->TypeId."\">".$t->type."</a></td><td>".$arr[$i]->date."</td><td>".$arr[$i]->time."</td><td>".$arr[$i]->recipient."</td><td><a href=\"../Controllers/UserController.php?Command=Show&DonId=".$arr[$i]->DonorId."\">".$arr[$i]->DonorId."</a></td><td>".$arr[$i]->feedback."</td><td>".$arr[$i]->Rating."</td>";
    if (isset($arr[$i]->Id) && !empty($arr[$i]->Id)) {
      echo "<td><a href='EditDonationForm.php?action=edit&id={$arr[$i]->Id}'>Edit</a></td>";
      echo "<td><a href='DeleteDonationForm.php?action=delete&id={$arr[$i]->Id}'>Delete</a></td>";
  }
    "</tr>";
}
?>

</table> <br>
<button onclick="location.href='Donation.php';">Back to Donations</button>
<button onclick="location.href='DonationType.php';">View Donation Types</button>
<button onclick="location.href='../Controllers/DonationDetailsController.php?Command=Add';">Insert New Donation</button>

</body>
</html>
