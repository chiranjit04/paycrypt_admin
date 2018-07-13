<?php
include('classes/planManager.php');

if (isset($_POST['plan_update'])) 
{
		$plantype=$_POST['planType'];
		$threshold=$_POST['threashold_amount'];
		$payable=$_POST['payable_amount'];
		$trans_fee=$_POST['transaction_fee'];
		$icon=$_POST['icon'];
		$pid= base64_decode($_POST['pid']);

		$updtPlan=$objPlan->planUpdate($pid,$plantype,$icon,$threshold,$payable,$trans_fee);
		if($updtPlan>0)
		{
			header('location:coin_plans.php?cp=yes');
		}
		else
		{
			echo "Not Updated";
		}
}



?>