<?php
class SubAdmin
{
	public $conn;
	function __construct()
	{
		global $conn;
		if($_SERVER['REMOTE_ADDR']=="127.0.0.1")
		{
		$host="127.0.0.1";
		$database="gourl";
		$user="root";
		$password="password";
		}
		else
		{
			$host="127.0.0.1";
			$database="gourl";
			$user="root";
			$password="password";
		}
		try
		{
			$conn=new PDO('mysql:host='.$host.';dbname='.$database,$user,$password);
			//print "connection established";
			
		}
		catch(Exception $e)
		{
			print "Error!".$e.getMessage();
		}
	}

	public function subAdmin($admin_name,$admin_pass,$email,$role,$status,$rest_page)
	{
		global $conn;
		$subLog=$conn->prepare("INSERT INTO admin(admin_name,admin_pass,email,role,status,rest_page)values('$admin_name','$admin_pass','$email','$role','$status','$rest_page')");
		$subLogExe=$subLog->execute();
		return $subLogExe;

	}

	public function adminTable()
	{
		global $conn;
		$admtbl=$conn->prepare("SELECT * FROM `admin` WHERE admn_id <> 1");
		$admtbl->execute();
		$countAdmn=$admtbl->rowCount();
		$admnArr=array();
		if($countAdmn>0)
		{
			while($key=$admtbl->fetch(PDO::FETCH_ASSOC))
			{
				$admnArr[]=$key;
			}
		}
		else
		{
			return 0;
		}
		return $admnArr;
	}

	public function adminFetch($admin_id)
	{
		global $conn;
		$admFtch=$conn->prepare("SELECT * FROM admin where admn_id='".$admin_id."' ");
		$admFtch->execute();
		$countRow=$admFtch->rowCount();
		$value=$admFtch->fetch();
		return $value;
	}

	public function adminUpdt($aid,$admin_name,$role,$email,$rest_page)
	{
		global $conn;

		$admnUpdt=$conn->prepare("UPDATE admin set admin_name='".$admin_name."',role='".$role."',email='".$email."',rest_page='".$rest_page."' where admn_id=".$aid."");
		$adminExe=$admnUpdt->execute();
		return $adminExe;
	}


}
$objSubadmin= new SubAdmin();

?>
