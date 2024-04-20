<?php

include_once "Function.php";
$obj=new DonationType();
if (isset($_GET['id']) && $_GET['id'] !== '') {
    $DonationTypeIdToDelete = $_GET['id'];
    $obj->deleteDonationType($DonationTypeIdToDelete, $obj->mainobj->filename);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit(); 
}

?>
