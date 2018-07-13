<?php
include('classes/merchant.php');
if(isset($_POST['m']))
{
	$merchantid=trim($_POST['m']);
	$updtRes=$objMerchat->merchantActive($merchantid);
	echo $updtRes;
}
?>