<?php
include('classes/merchant.php');
$year=$_POST['y'];
print_r($objMerchat->graphData($year));
?>