<?php
class coinManager
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


	public function coinTable()
	{
		global $conn;
		$coin=$conn->prepare("SELECT * FROM coin");
		$coin->execute();
		$countCoin=$coin->rowCount();
		$coinArr=array();
		if($countCoin>0)
		{
			while ($coinKey=$coin->fetch(PDO::FETCH_ASSOC))
			{
				$coinArr[]=$coinKey;
			}
		}
		else
		{
			return 0;
		}
		return $coinArr;

	}


	public  function coinInsert($coin_name,$coin_image,$coin_abb)
	{
		global $conn;
		$coinInsert=$conn->prepare("INSERT INTO coin(coin_name,coin_image,coin_abbrv)values('$coin_name','$coin_image','$coin_abb')");
		$coinExecute=$coinInsert->execute();
		return $coinExecute;


	}

	public function coinCheck($coin_name)
	{
		global $conn;
		$checkCoin=$conn->prepare("SELECT * from coin where coin_name='".$coin_name."'");
		$checkCoin->execute();
		$countCoin=$checkCoin->rowCount();
		return $countCoin;
	}

	public function coinDelete($coin_id)
	{
		global $conn;
		$coinDel=$conn->prepare("DELETE FROM coin where coin_id='".$coin_id."'");
		$coinExe=$coinDel->execute();
		return $coinExe;
	}


	public function coinUpdate($cid,$name,$coin_image,$coin_abb)
	{
		global $conn;
		//echo "UPDATE coin set coin_name='".$name."',coin_abbrv='".$coin_abb."',coin_image='".$coin_image."' where coin_id=".$cid."";
		$coinUpdt=$conn->prepare("UPDATE coin set coin_name='".$name."',coin_abbrv='".$coin_abb."',coin_image='".$coin_image."' where coin_id=".$cid."");
		$updateCoin=$coinUpdt->execute();
		return $updateCoin;

	}

	public function coinFetch($coin_id)
	{

		global $conn;
		$coin=$conn->prepare("SELECT * FROM coin where coin_id='".$coin_id."'");
		$coin->execute();
		$coinExe=$coin->rowCount();
		$value = $coin->fetch();
		
		return $value;
	}


}

$objcoinManager=new coinManager();

?>