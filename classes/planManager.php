<?php
class planManager
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

	public function planTable()
	{
		global$conn;
		$coinPlan=$conn->prepare("SELECT * FROM plans_tbl");
		$coinPlan->execute();
		$planCount=$coinPlan->rowCount();
		$planArr=array();
		if($planCount>0)
		{
			while ($key=$coinPlan->fetch(PDO::FETCH_ASSOC)) 
			{
				$planArr[]=$key;
			}
		}
		else
		{
			return 0;
		}
		return $planArr;
	}


	public function planInsert($planType,$icon,$threshold,$payable,$trans_fee)
	{
		global $conn;
		$plan=$conn->prepare("INSERT INTO plans_tbl(planType,icon_class,threashold_amount,payable_amount,transaction_fee) values('$planType','$icon','$threshold','$payable','$trans_fee') ");
		$planExe=$plan->execute();
		return $planExe;

	}

	public function planDelete($planId)
	{
		global $conn;
		$planDel=$conn->prepare("DELETE FROM plans_tbl where planId='".$planId."'");
		$planExe=$planDel->execute();
		return $planExe;
	}

	public function fetchPlan($planId)
	{
		global $conn;
		$fetchPlan=$conn->prepare("SELECT * FROM plans_tbl where planId='".$planId."'");
		$fetchPlan->execute();
		$planRow=$fetchPlan->rowCount();
		$planValue=$fetchPlan->fetch();
		return $planValue;
	}

	public function planUpdate($pid,$plantype,$icon,$threshold,$payable,$trans_fee)
	{
		global $conn;
		
		$planUpdt=$conn->prepare("UPDATE plans_tbl set planType='".$plantype."',icon_class='".$icon."',threashold_amount='".$threshold."',payable_amount='".$payable."',transaction_fee='".$trans_fee."' where planId=".$pid."");
		$planExe=$planUpdt->execute();
		return $planExe;

	}
}

$objPlan=new planManager();

?>