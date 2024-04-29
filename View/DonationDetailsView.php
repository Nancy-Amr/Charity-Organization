
<?php
class DonationDetailsView{
  function showDonationDetails($don,$type){
    echo "<h1>Donation Details</h1>";
    echo"<style>
table{
border-collapse: collapse;
width: 70%; 
background-color: #f2f2f2; /
 border: 1px solid black;
 padding: 5px;
}
th, td {
    border: 1px solid black;
    padding: 8px;
  }

  th {
    background-color: #e9e9e9; 
  }

</style>";
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
