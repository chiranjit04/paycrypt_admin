<?php 
include('header.php'); 
include('classes/coinManager.php');
?>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        placement : 'top'
    });
});
</script>

<?php if($_SESSION['role']=="admin"){ ?>

<div class="wrapper wrapper-content">
      <div class="row">
         <div class="col-lg-12" id="coinLoad">
<?php
if(isset($_REQUEST['i']))
{
	if($_REQUEST['i']=="yes")
	{?>
		<div class="success-msg">
		<i class="fa fa-check"></i>
		<?php echo "Successfully coin added";?>
		</div>
	<?php
	}
}
            ?>
                 	      <div class="ibox float-e-margins">
                            <div class="ibox-title">
                    	       <h5 class="text-center">Coins<small> Available Coins</small></h5>
	 
                 <table class="table table-striped table-bordered
                table-hover dataTables-example " id="coin">

                	<thead> 
                        <tr>
                            <th><h5>#</h5></th>
                            <th>Coin Name</th>
                            <th>Coin Image</th>
                            <th>Abbreviation</th>
                            <th>Actions</th>                      
                        </tr>
                    </thead>
                    <tbody>
                    	<?php

                    	$coin=$objcoinManager->coinTable();
                    	if(count($coin)>0)
                    	{
                    		$i='1';
                    		foreach ($coin as $key => $coinValue) 
                    		{
                    	?>
                			<tr><td><?php echo $i; ?> </td>
                				<td><?= $coinValue['coin_name'] ?></td>
                				<td><?= $coinValue['coin_image'] ?></td>
                				<td><?= $coinValue['coin_abbrv'] ?></td>
                                <td>
                                    <div class="col-lg-6">
                				    <a class="delCoin fa fa-trash fa-lg" id="<?= $coinValue['coin_id'] ?>" href="#" name="delete" ></a>
                                    </div>
                                    <div class="col-lg-6">
                                    <a class="uptCoin fa fa-edit fa-lg" name="delete" href="coin_update.php?id=<?php echo base64_encode($coinValue['coin_id']);?>"></a>
                                    </div>
                                </td>
                    	<?php
                    		$i++;
                    	}
                    }
                    	?>			
                    			</tr>
                    			<div><th colspan="5"><a href="coin_insert.php" class="fa fa-plus-circle fa-lg"> Add Coin</a></th></div>
                    </tbody>
               </table>
               </div>
               </div>
 			</div>
       </div>
   </div>
   <?php } 
   else
   {
    $roles=explode(',',$_SESSION['rest_page']);
   ?>
   <div class="wrapper wrapper-content">
      <div class="row">
         <div class="col-lg-12" id="coinLoad">
<?php
if(isset($_REQUEST['i']))
{
    if($_REQUEST['i']=="yes")
    {?>
        <div class="success-msg">
        <i class="fa fa-check"></i>
        <?php echo "Successfully coin added";?>
        </div>
    <?php
    }
}
            ?>
                          <div class="ibox float-e-margins">
                            <div class="ibox-title">
                               <h2 class="text-center">Available Coins</h2>
     
                 <table class="table table-striped table-bordered
                table-hover dataTables-example " id="coin">

                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Coin Name</th>
                            <th>Coin Image</th>
                            <th>Abbreviation</th>
                            <th>Actions</th>                      
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $coin=$objcoinManager->coinTable();
                        if(count($coin)>0)
                        {
                            $i='1';
                            foreach ($coin as $key => $coinValue) 
                            {
                        ?>
                            <tr><td><?php echo $i; ?> </td>
                                <td><?= $coinValue['coin_name'] ?></td>
                                <td><?= $coinValue['coin_image'] ?></td>
                                <td><?= $coinValue['coin_abbrv'] ?></td>

                                <td>
                                <?php if(in_array('Coin_Delete', $roles))
                                         {
                                ?>
                                    <div class="col-lg-6">
                                    <a class="delCoin" id="<?= $coinValue['coin_id'] ?>" href="#" name="delete">Delete </a>
                                    </div>
                                <?php }
                                else{ 
                                ?>
                                <div class="col-lg-6" data-toggle="tooltip" title="Not Permited">Delete</div>
                                <?php
                              }
                                 if(in_array('Coin_Update', $roles))
                                         {
                                ?>
                                    <div class="col-lg-6">
                                    <a class="uptCoin" name="delete" href="coin_update.php?id=<?php echo base64_encode($coinValue['coin_id']);?>">Update >></a>
                                    </div>
                                <?php } 
                                else{
                                ?><div class="col-lg-6" data-toggle="tooltip" title="Not Permited">Update</div>
                                </td>
                        <?php
                      }
                            $i++;
                        }
                    }
                        ?>          
                                </tr>
                                <?php if(in_array('Coin_Add', $roles))
                                         {
                                ?>
                                <div><th colspan="5"><a href="coin_insert.php">Add Coin >> </a></th></div>
                                <?php } 
                                else{
                                ?>
                                <div><th data-toggle="tooltip" title="Not Permited" colspan="5">Add Coin >></th></div>
                                <?php } ?>
                    </tbody>
               </table>
               </div>
               </div>
            </div>
       </div>
   </div>
   <?php } ?>


<?php include('footer.php'); ?>
