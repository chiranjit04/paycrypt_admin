<?php
include('classes/Credential.php');

if(isset($_POST['cred_updt']))
{
		$host_name=$_POST['host_name'];
		$host_port=$_POST['host_port'];
		$host_user=$_POST['host_user'];
		$host_pass=$_POST['host_pass'];
		$coin_name=$_POST['coin_name'];
		$hid=base64_decode($_POST['hid']);

		$credUpdt=$objCredential->credUpdate($hid,$host_name,$host_port,$host_user,$host_pass,$coin_name);
		if($credUpdt>0)
		{
			header('location:credential.php?c=yes');
		}
		else
		{
			echo "Updation Failed";
		}
}






?>