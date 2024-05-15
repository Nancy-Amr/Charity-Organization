
<?php
class DonationTypeView{
  function showDonationType($DonType){
echo "<h1>Donation Type</h1>";
echo '<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>';
echo"<table>
<tr>
<th>Id</th>
<th>Type</th>
<th>Description</th>
</tr> 
</div>";
echo "<tr><td>".$DonType->Id."</td><td>".$DonType->type."</td><td>".$DonType->Description."</td></tr></table>";
echo '<br><br><button onclick="history.back()">Go Back</button>';
}
}
?>