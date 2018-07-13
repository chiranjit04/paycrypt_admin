<?php
include('classes/planManager.php');

if(isset($_POST['id']))
{
	$planId=trim($_POST['id']);
	$planDel=$objPlan->planDelete($planId);
	echo $planDel;
}

?>