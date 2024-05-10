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
        <h1>List of all Donation Types</h1>
        <table>
            <tr>
                    <td>Id</td>
                    <td>Type</td>
                    <td>Description</td>
            </tr> 
        </div>

      
<?php
include_once"../Models/DonationType/DonationTypeClass.php";
$obj=new DonationType();
$arr=[];
$arr=$obj->ListallDonationTypes();
for($i=0;$i<count($arr);$i++){
    echo"<tr><td>".$arr[$i]->Id."</td><td>".$arr[$i]->type."</td><td>".$arr[$i]->Description."</td>";
    if (isset($arr[$i]->Id) && !empty($arr[$i]->Id)) {
        echo "<td><a href='EditDonationType.php?action=edit&id={$arr[$i]->Id}'>Edit</a></td>";
        echo "<td><a href='DeleteDonationtype.php?action=delete&id={$arr[$i]->Id}'>Delete</a></td>";
    }
    echo "</tr>";
}
?>

</table>
<div class="button-container">
<button onclick="location.href='../Controllers/DonationTypeController.php?Command=Add';">Insert New Donation Type</button><br>
<button onclick="location.href='Donation.php';">View All Donations</button><br>
</div>
</body>
</html>
