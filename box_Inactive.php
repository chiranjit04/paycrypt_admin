<?php
include('classes/merchant.php');
if(isset($_POST['m']))
{
	$boxId=trim($_POST['m']);
	$updtRes=$objMerchat->boxInactive($boxId);
	echo $updtRes;
}
?>