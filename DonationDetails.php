<?php
include_once"Function.php";
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
    <link rel="stylesheet" type="text/css" media="screen" href='main.css'/>
    <script src='main.js'></script>
    <style>
        table, th, td {
         border: 1px solid black;
         padding: 5px;
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
    echo"<tr><td>".$arr[$i]->Id."</td><td><a href=\"DonationTypeController.php?Command=Show&DonId=".$arr[$i]->TypeId."\">".$t->type."</a></td><td>".$arr[$i]->date."</td><td>".$arr[$i]->time."</td><td>".$arr[$i]->recipient."</td><td><a href=\"UserController.php?Command=Show&DonId=".$arr[$i]->Id."\">".$arr[$i]->DonorId."</a></td><td>".$arr[$i]->feedback."</td><td>".$arr[$i]->Rating."</td>";
    if (isset($arr[$i]->Id) && !empty($arr[$i]->Id)) {
      echo "<td><a href='EditDonationForm.php?action=edit&id={$arr[$i]->Id}'>Edit</a></td>";
      echo "<td><a href='DeleteDonationForm.php?action=delete&id={$arr[$i]->Id}'>Delete</a></td>";
  }
    "</tr>";
}
?>

</table>
<button onclick="location.href='Donation.php';">Back to Donations</button>
<button onclick="location.href='DonationType.php';">View Donation Types</button><br><br>
<button onclick="location.href='DonationDetailsController.php?Command=Add';">Insert New Donation</button>

</body>
</html>
