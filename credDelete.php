<?php
include('classes/Credential.php');

if(isset($_POST['id']))
{
	$host_id=trim($_POST['id']);
	$credDel=$objCredential->credDel($host_id);
	echo $credDel;
}


?>