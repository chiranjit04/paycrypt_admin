<?php
include('classes/coinManager.php');

if(isset($_POST['id']))
{
	$coinId=trim($_POST['id']);
	$delCoin=$objcoinManager->coinDelete($coinId);
	echo $delCoin;
}




?>