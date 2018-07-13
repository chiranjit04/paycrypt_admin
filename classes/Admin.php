<?php

class Admin
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

	public function adminLogin($name,$pass)
	{
		global $conn;
		$login=$conn->prepare("SELECT * FROM admin where admin_name='".$name."' and admin_pass='".md5($pass)."' and status='1'");
		$login->execute();
		$count=$login->rowCount();
		$rowVal="";
		if($count>0)
		{
			$rowVal=$login->fetch(PDO::FETCH_ASSOC);
			return $rowVal;
		}
		else
		{
			return 0;
		}
		
	}

	

}

$objAdmin=new Admin();

?>


