
<?php
class DonationTypeView{
  function showDonationType($DonType){
echo "<h1>Donation Type</h1>";
echo"<style>
table{
    border-collapse: collapse;
    width: 50%; 
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
echo"<table>
<tr>
        <td>Id</td>
        <td>Type</td>
        <td>Description</td>
</tr> 
</div>";
echo "<tr><td>".$DonType->Id."</td><td>".$DonType->type."</td><td>".$DonType->Description."</td></tr></table>";
echo '<br><br><button onclick="history.back()">Go Back</button>';
}
}
?>