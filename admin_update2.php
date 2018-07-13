<?php
include('classes/Sub_Admin.php');

if(isset($_POST['update']))
{
	$admin_name=$_POST['name'];
	$role=$_POST['role'];
	$email=$_POST['email'];
	$rest_page=implode(',', $_POST['rest_page']);
	$aid=base64_decode($_POST['aid']);
	

	$adminUpdat=$objSubadmin->adminUpdt($aid,$admin_name,$role,$email,$rest_page);
	if($adminUpdat>0)
	{
		header('location:admins-table.php');
	}
	else
	{
		echo "not updated";
	}

}





?>