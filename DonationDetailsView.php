
<?php
class DonationDetailsView{
  function showDonationDetails($don,$type){
    echo "<h2>Donation Details</h2>";

    echo "<table border='1'>
    <tr>
      <th>ID</th>
      <th>Type</th>
      <th>Date</th>
      <th>Time</th>
      <th>Recipient</th>
      <th>Donor ID</th>
      <th>Feedback</th>
      <th>Rating</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
    <tr><td>".$don->Id."</td><td><a href=DonationTypeController.php?DonId=".$don->TypeId.">".$type->type."</a></td><td>".$don->date."</td><td>".$don->time."</td><td>".$don->recipient."</td><td><a href=UserController.php?DonId=".$don->Id.">".$don->DonorId."</a></td><td>".$don->feedback."</td><td>".$don->Rating."</td>";
    if (isset($don->Id) && !empty($don->Id)) {
      echo "<td><a href='EditDonationForm.php?action=edit&id={$don->Id}'>Edit</a></td>";
      echo "<td><a href='DeleteDonationForm.php?action=delete&id={$don->Id}'>Delete</a></td>";
  
    echo"</tr></table><br><br>";

    echo '<button onclick="history.back()">Go Back</button>';
    }
  }
}
?>
