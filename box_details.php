<?php
		include('classes/merchant.php');
		if(isset($_POST['p']))
	{

?>

		<table class="table" id="merchantDtl">
<?php

		$privateKey=trim($_POST['p']);
		$boxdata=$objMerchat->boxDetail($privateKey);
		//echo "<pre>";
		//print_r($boxdata);
		if(count($boxdata)>0)
		{
?>

	<tr>
		<label>
              <td><h4>Box ID:</h4></td>
        </label> <td> <?= $boxdata['boxID'] ?> </td>
    </tr>
    <tr>
		<label>
              <td><h4>Box Name:</h4></td>
        </label> <td> <?= $boxdata['boxName'] ?> </td>
    </tr>
    <tr>
		<label>
              <td><h4>Coin Label:</h4></td>
        </label> <td> <?= $boxdata['coinLabel'] ?> </td>
    </tr>
    <tr>
		<label>
              <td><h4>Callback Url:</h4></td>
        </label> <td> <?= $boxdata['callbackUrl'] ?> </td>
    </tr>
    <tr>
		<label>
              <td><h4>Website:</h4></td>
        </label> <td> <?= $boxdata['website'] ?> </td>
    </tr>
    

<?php 
	
		}
	}
?>
