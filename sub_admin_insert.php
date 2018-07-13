<?php include('classes/Sub_Admin.php');?>
<?php

if(isset($_POST['sub_insert']))
{

	$admin_name=$_POST['Username'];
	$admin_pass=md5($_POST['Password']);
	$email=$_POST['Email'];
	$role=$_POST['role'];
	$status=$_POST['status'];
	$rest_page=implode(',', $_POST['rest_page']);

	$subRole=$objSubadmin->subAdmin($admin_name,$admin_pass,$email,$role,$status,$rest_page);
	if($subRole>0)
	{
		header('location:sub-admin.php?sub=yes');
	}
	else
	{
		echo "not inserted";
	}
}

?>