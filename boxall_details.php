
<?php
include('classes/merchant.php');
include('header.php'); 
?>
<div class="wrapper wrapper-content">
    <div class="row">
    
        <div class="col-lg-12" id="loaddata">
          <div class="ibox float-e-margins">
            <div class="ibox-title">
          <h2 class="text-center">Box</h2>
			     <table class="table table-striped table-bordered
                table-hover dataTables-example" id="merchantDtl">
<?php
		//$privateKey=trim($_POST['p']);
		$privateKey=base64_decode($_REQUEST['id']);
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
?>
    </table>
    </div>
    </div>
    </div>


<div class="col-lg-12 b-r" >

<div class="table-responsive"> 
<table class="table table-striped table-bordered b-r" id="walletVal">
<h2 class="text-center">Credited Information</h2>
<thead>
  <tr><th>#</th>
      <th>Total Amount</th>
      <th>Address</th>
      <th>Invoice</th>
      <th>Transaction Id</th>
                               
  </tr>
</thead>
<tbody>
  <?php

    $publickey=base64_decode($_REQUEST['pub']);
    $boxIds=$boxdata['boxID'];
    $cryptoData=$objMerchat->cryptoPayWallet($publickey,$boxIds);
    
    //count($cryptoData);

    if(count($cryptoData)>0)
    {
      $i='1';
      foreach ($cryptoData as $key => $crypto)
      {
        
  ?>
      <tr>
    <td><?php echo $i; ?></td>
        <td> <?= $crypto['tot_amt'] ?> </td>  
        <td> <?= $crypto['address'] ?> </td>     
        <td> <?= $crypto['invoice'] ?> </td>
        <td> <?= $crypto['txid'] ?> </td>
   
    </tr>
    <?php
     $i++;
      }
    }
      ?>
    </tbody>

    </table>

      </div>
        </div>

<div class="col-lg-12">
  <div class="table-responsive">
    <table class="table table-striped table-bordered" id="payout">
      <h2 class="text-center">Debited Information</h2>
        <thead>
          <tr><th>Amount</th>
              <th>Current Amount</th>
              <th>Fees</th>
              <th>Transaction Id</th>
                                       
          </tr>
        </thead>
        <tbody>
          
  <?php
        $email=base64_decode($_REQUEST['e']);
        $payoutDetail=$objMerchat->payOut($email);
        //print_r($payoutDetail);
        if(count($payoutDetail)>0)
            {
              foreach ($payoutDetail as $key=>$payout) 
              {       

  ?>
          <tr>
                <td><?=$payout['amount']?></td>
                <td><?=$payout['current_amount']?></td>  
                <td><?=$payout['fees']?></td>
                <td><?=$payout['transId']?></td>    
          </tr>

          <?php
              }
           }

          ?>
            
            </tbody>

    </table>
      </div>
        </div>
    </div>
</div>



           
    <?php include('footer.php'); ?>
    <script>

        $(document).ready(function(){
            $('#walletVal').DataTable({
                pageLength: 10,
                responsive: true
            });

            $('#payout').DataTable({
                pageLength: 10,
                responsive: true
            });

        });

    </script>
