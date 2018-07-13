<?php
class Credential
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

	public function credDetails()
	{
		global $conn;
		$credential=$conn->prepare("SELECT * FROM credencial");
		$credential->execute();
		$credCount=$credential->rowCount();
		$credArr=array();
		if($credCount>0)
		{
			while ($credKey=$credential->fetch(PDO::FETCH_ASSOC))
			{
				$credArr[]=$credKey;
			}

		}
		else
		{
			return 0;
		}
		return $credArr;
	}

	public function credDel($host_id)
	{
		global $conn;
		$credential=$conn->prepare("DELETE FROM credencial where host_id='".$host_id."'");
		$credExe=$credential->execute();
		return $credExe;
	}

	public function credUpdate($hid,$host_name,$host_port,$host_user,$host_pass,$coin_name)
	{
		global $conn;
		$credUpdt=$conn->prepare("UPDATE credencial set host_name='".$host_name."',host_port='".$host_port."',host_user='".$host_user."',host_pass='".$host_pass."',coin_name='".$coin_name."' where host_id=".$hid." ");
		$updateCred=$credUpdt->execute();
		return $updateCred;

	}

	public function credFetch($host_id)
	{
		global $conn;
		$credFetch=$conn->prepare("SELECT * FROM credencial where host_id='".$host_id."'");
		$credFetch->execute();
		$credExe=$credFetch->rowCount();
		$value=$credFetch->fetch();
		return $value;
	}

	public function credInsert($host_name,$host_port,$host_user,$host_pass,$coin_name)
	{
		global $conn;
		$credInsrt=$conn->prepare("INSERT INTO credencial(host_name,host_port,host_user,host_pass,coin_name) VALUES('$host_name','$host_port','$host_user','$host_pass','$coin_name')");
		$credExe=$credInsrt->execute();
		return $credExe;
	}


}
$objCredential=new Credential();








?>