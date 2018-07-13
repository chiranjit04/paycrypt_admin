<?php
class Merchant
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

	public function merchantLists()
	{
		global $conn;
		$merchantList=$conn->prepare("select * from users order by user_id desc");
		$merchantList->execute();
		$countNum=$merchantList->rowCount();
		$merchantVal=array();
		if($countNum>0)
		{
			while ($row=$merchantList->fetch(PDO::FETCH_ASSOC))
			{
				$merchantVal[]=$row;
			}
			
		}
		else
		{
			return 0;
		}
		return $merchantVal;
	}


	public function marchantDetail($email)
	{
		global $conn;
		$marchantDetails=$conn->prepare("select * from users where email='".$email."'");
		$marchantDetails->execute();
		$countDetail=$marchantDetails->rowCount();
		if($countDetail>0)
		{
			$row=$marchantDetails->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		else
		{
			return 0;
		}
		
	}
	public function getMerchantPlan($planId)
	{
		global $conn;
		$userPln=$conn->prepare("select planType from plans_tbl where planId=".$planId."");
		$userPln->execute();
		$row=$userPln->fetch(PDO::FETCH_ASSOC);
		return $row['planType'];
	}

	public function merchantActive($merchantId)
	{
		global $conn;
		$updateStatus=$conn->prepare("update users set ustatus='1' where user_id=".$merchantId."");
		$updateStatusRes=$updateStatus->execute();
		return $updateStatusRes;
	}
	public function merchantInActive($merchantId)
	{
		global $conn;
		$updateStatus=$conn->prepare("update users set ustatus='0' where user_id=".$merchantId."");
		$updateStatusRes=$updateStatus->execute();
		return $updateStatusRes;
	}

	

	public function boxDetail($privateKey)
	{
		global $conn;

		$secretVal=$conn->prepare("select * from security_key where privateKey='".$privateKey."'");
		$secretVal->execute();
		if(count($secretVal->rowCount())>0)
		{
			$rowSecret=$secretVal->fetch(PDO::FETCH_ASSOC);
			//selecting data from monetiser
			$boxVal=$conn->prepare("select * from monetiser where privateURL='".$privateKey."'");
			$boxVal->execute();
			if(count($boxVal->rowCount())>0)
			{
				$rowBox=$boxVal->fetch(PDO::FETCH_ASSOC);
			}
			else
			{
				$rowBox=array();
			}
			$newArr=array_merge($rowSecret,$rowBox);
			return $newArr;
		}
		else
		{
			return 0;
		}

		
	}


	public function getSecretKye($email)
	{ 

	global $conn;
	$secreteKye=$conn->prepare("select publicKey,privateKey,boxName,boxID,email from security_key where email='".$email."'");
	$secreteKye->execute();
	$countRow=$secreteKye->rowCount();
	$secrete=array();
	if($countRow>0)
	{
		while($kye=$secreteKye->fetch(PDO::FETCH_ASSOC))
		{
			$secrete[]=$kye;
		}
	}
	else
	{
		return 0;
	}
	return $secrete;
	}



	public function cryptoPayWallet($publickey,$boxID)
	{
		global $conn;
		$wallet=$conn->prepare("SELECT * FROM `walletnotify` INNER JOIN `crypto_payments` on walletnotify.txid = crypto_payments.txID where publickey='".$publickey."'");
		$wallet->execute();
		$countCrypt=$wallet->rowCount();
		$rowValue=array();
		if($countCrypt>0)
		{

			while($keyVal=$wallet->fetch(PDO::FETCH_ASSOC))
			{
				$rowValue[]=$keyVal;
			}
		}
		else{
			return 0;
		}
		return $rowValue;
	}

	public function payOut($email)
	{
		global $conn;
		$payout=$conn->prepare("SELECT * FROM payouts where transId!='' AND emailId='".$email."'");
		$payout->execute();
		$countPay=$payout->rowCount();
		$payArr=array();
		if($countPay>0)
		{
			while($keyPay=$payout->fetch(PDO::FETCH_ASSOC))
			{
				$payArr[]=$keyPay;
			}
		}
		else
		{
			return 0;
		}
		return $payArr;
	}

	

	public function currencyValues($month,$year)
	{
		global $conn;
		$sumAmt=$conn->prepare("SELECT sum(amount) as sumVal FROM walletnotify where txid!='' AND month='".$month."' and year='".$year."'");
		$sumAmt->execute();
		$countAmt=$sumAmt->rowCount();
		$sumArr=0;
		if($countAmt>0)
		{
			$keySum=$sumAmt->fetch(PDO::FETCH_ASSOC);
			if($keySum==NULL)
			{
				$sumArr=0;
			}
			else
			{
				$sumArr=$keySum['sumVal'];
			}
				
		}
		else
		{
			return 0;
		}
		return $sumArr;
	}

	public function graphData($year)
	{
		$month=Array("01" => "Jan","02" => "Feb","03" => "March","04" => "April","05" => "May","06" => "June","07" => "July","08" => "Aug","09" => "Sep","10" => "Oct","11" => "Nov","12" => "Dec");
	    $monthVal=array();
	    $sumCurrency=0;
	    foreach ($month as $key => $valueMonth) {
	        
	        if($key<=date('m'))
	        {
	        $sumCurrency=$this->currencyValues($key,$year);
	        if($sumCurrency==null)
	        {
	            $dataVal=array('label'=>$valueMonth,'y'=>0);
	        }
	        else
	        {
	          $dataVal=array('label'=>$valueMonth,'y'=>(float)$sumCurrency);  
	        }
	        
	        array_push($monthVal, $dataVal);
	        }
	    }
	    
	    return $graphData=json_encode($monthVal);
	}

	public function getYear()
	{
		global $conn;
		$year=$conn->prepare("SELECT DISTINCT year FROM walletnotify");
		$year->execute();
		$countYear=$year->rowCount();
		$yearArr=array();
		if($countYear>0)
		{
			while($keyYear=$year->fetch(PDO::FETCH_ASSOC))
			{
				$yearArr[]=$keyYear;
			}
		}
		else
		{
			return 0;
		}
		return $yearArr;
	}


	public function boxStatus($boxID)
	{	
		global $conn;

		$boxStat=$conn->prepare("select active from monetiser where boxID='".$boxID."'");
		$boxStat->execute();
		$row=$boxStat->fetch(PDO::FETCH_ASSOC);
		return $row['active'];
	}

	public function boxActive($boxID)
	{
		global $conn;
		$boxactive=$conn->prepare("update monetiser set active='1' where boxID='".$boxID."'");
		$boxst=$boxactive->execute();
		return $boxst;
	}

	public function boxInactive($boxID)
	{
		global $conn;
		$boxinactive=$conn->prepare("update monetiser set active='0' where boxID='".$boxID."'");
		$boxin=$boxinactive->execute();
		return $boxin;
	}

	public function marchList()
	{
		global $conn;
		$march=$conn->prepare("SELECT * FROM users order by user_id desc limit 5");
		$march->execute();
		$marchRow=$march->rowCount();
		$marchVal=array();
		if($marchRow>0)
		{
			while($key=$march->fetch(PDO::FETCH_ASSOC))
			{
				$marchVal[]=$key;
			}
		}
		else
		{
			return 0;
		}
		return $marchVal;
	}

	public function coinList()
	{
		global $conn;
		$coinMng=$conn->prepare("SELECT * FROM coin order by coin_id desc limit 5");
		$coinMng->execute();
		$coinRow=$coinMng->rowCount();
		$coinArr=array();
		if($coinRow>0)
		{
			while($key=$coinMng->fetch(PDO::FETCH_ASSOC))
			{
				$coinArr[]=$key;
			}
		}
		else
		{
			return 0;
		}
		return $coinArr;
	}

	public function credList()
	{
		global $conn;
		$credlst=$conn->prepare("SELECT * FROM credencial order by host_id desc limit 5");
		$credlst->execute();
		$credRow=$credlst->rowCount();
		$credArr=array();
		if($credRow>0)
		{
			while($key=$credlst->fetch(PDO::FETCH_ASSOC))
			{
				$credArr[]=$key;
			}
		}
		else
		{
			return 0;
		}
		return $credArr;
	}



}
$objMerchat=new Merchant();






?>