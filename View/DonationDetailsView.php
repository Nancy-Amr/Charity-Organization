
<?php
class DonationDetailsView{
  function showDonationDetails($don,$type){
    echo "<h1>Donation Details</h1>";
    echo '<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>';
    echo "<table>
    <tr>
      <th>ID</th>
      <th>Type</th>
      <th>Date</th>
      <th>Time</th>
      <th>Recipient</th>
      <th>Donor ID</th>
      <th>Feedback</th>
      <th>Rating</th>
    </tr>
    <tr><td>".$don->Id."</td><td><a href=\"../Controllers/DonationTypeController.php?Command=Show&DonId=".$don->TypeId."\">".$type->type."</a></td><td>".$don->date."</td><td>".$don->time."</td><td>".$don->recipient."</td><td><a href=\"../Controllers/UserController.php?Command=Show&DonId=".$don->DonorId."\">".$don->DonorId."</a></td><td>".$don->feedback."</td><td>".$don->Rating."</td>";
    
  
    echo"</tr></table><br><br>";

    echo '<button onclick="history.back()">Go Back</button>';
    
  }
}
?>
