<?php
include('classes/planManager.php');

if(isset($_POST['plan_insert']))
{
		$planType=$_POST['planType'];
		$icon=$_POST['icon_class'];
		$threshold=$_POST['threashold_amount'];
		$payable=$_POST['payable_amount'];
		$trans_fee=$_POST['transaction_fee'];

		$planIsrt=$objPlan->planInsert($planType,$icon,$threshold,$payable,$trans_fee);
		if($planIsrt)
		{
			header('location:coin_plans.php?p=yes');
		}
		else
		{
			echo "Insertion Failed";
		}
}






?>