<?php
include('classes/Credential.php');

if(isset($_POST['Cred_insert']))
{
	$host_name=$_POST['host_name'];
	$host_port=$_POST['host_port'];
	$host_user=$_POST['host_user'];
	$host_pass=$_POST['host_pass'];
	$coin_name=$_POST['coin_name'];

	$credIsert=$objCredential->credInsert($host_name,$host_port,$host_user,$host_pass,$coin_name);
	if($credIsert>0)
	{
		header('location:credential.php?cred=yes');
	}
	else
	{
		echo "Credential Not Inserted";
	}
}



?>