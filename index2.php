<?php

include('classes/Admin.php');
if(isset($_POST['login']))
{
	$name=$_POST['name'];
	$pass=$_POST['pass'];

	$loginAdmin=$objAdmin->adminLogin($name,$pass);
	
	if(count($loginAdmin)>0)
	{
		session_start();
		$role=$loginAdmin['role'];
		if($role=="Sub_Admin")
		{
			$_SESSION['rest_page']=$loginAdmin['rest_page'];
		}
		$_SESSION['role']=$loginAdmin['role'];
		$_SESSION['admn_id']=$name;
		$_SESSION['admin']=$loginAdmin['admin_name'];

		header('location:dashboard.php');
	}
	else
	{
		header('location:index.php?l=fail');
	}
}

?>