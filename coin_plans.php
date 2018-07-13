<?php 
include('header.php'); 
include('classes/planManager.php');
?>
<?php if($_SESSION['role']=="admin"){ ?>
<div class="wrapper wrapper-content">
      	<div class="row">
      		<div class="ibox float-e-margins">
            	<div class="ibox-title">
                            <div>
                            <?php
                            if(isset($_REQUEST['p']))
                            {
                            if($_REQUEST['p']=="yes")
                            {
                            ?>
                            <div class="success-msg">
                            <i class="fa fa-check"></i>
                            <?php echo "Insertion Successfull"; ?>
                            </div>
                            <?php
                            }
                            }
                            ?>
                            </div>
                            <h5>Coin Plan <small>Manage Coin Plans</small></h5>
                            <table class="table table-striped table-bordered table-hover dataTables-example " id="credent">

							<thead>
                        <tr>
                            <th><h5>#</h5></th>
                            <th>Plan Type</th>
                            <th>Icons</th>
                            <th>Threashold Amount</th>
                            <th>Payable Amount</th>
                            <th>Transaction Fee</th>
                            <th>Actions</th>                      
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $PlanTable=$objPlan->planTable();
	                    if(count($PlanTable)>0)
	                    {
	                    	$i='1';
	                    	foreach ($PlanTable as $key => $planValue) 
	                    	{
                    ?>
                    			<tr>
	                    			<td><?php echo $i;  ?></td>
	                				<td><?=$planValue['planType']?></td>
	                				<td><?=$planValue['icon_class']?></td>
	                				<td><?=$planValue['threashold_amount']?></td>
                                    <td><?=$planValue['payable_amount']?></td>
	                				<td><?=$planValue['transaction_fee']?></td>
                                    <td>
                                        <div class="col-lg-6">
                                    <a class="PlanDlt fa fa-trash fa-lg" id="<?= $planValue['planId'] ?>" href="#" name="delete"></a>
                                    </div>
                                    <div class="col-lg-6">
                                    <a class="uptPlan fa fa-edit fa-lg" name="update" href="plan_update.php?id=<?php echo base64_encode($planValue['planId']);?>"></a>
                                    </div>

                                    </td>
                    				
                    			</tr>
                    			<?php
                    			$i++;
                    		}
                    	}

                    			?>
                    		

                    <div><th colspan="7"><a href="plan_insert.php" class="fa fa-plus-circle fa-lg"> Add Plans</a></th></div>
                    			
                    </tbody>

						</table>
				</div>
			</div>
		</div>
	</div>
    <?php
     }
     else
     {
    $roles=explode(',',$_SESSION['rest_page']);
     ?>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                            <div>
                            <?php
                            if(isset($_REQUEST['p']))
                            {
                            if($_REQUEST['p']=="yes")
                            {
                            ?>
                            <div class="success-msg">
                            <i class="fa fa-check"></i>
                            <?php echo "Insertion Successfull"; ?>
                            </div>
                            <?php
                            }
                            }
                            ?>
                            </div>
                            <h5>Coin Plan <small>Manage Coin Plans</small></h5>
                            <table class="table table-striped table-bordered table-hover dataTables-example " id="credent">

                            <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Plan Type</th>
                            <th>Icons</th>
                            <th>Threashold Amount</th>
                            <th>Payable Amount</th>
                            <th>Transaction Fee</th>
                            <th>Actions</th>                      
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $PlanTable=$objPlan->planTable();
                        if(count($PlanTable)>0)
                        {
                            $i='1';
                            foreach ($PlanTable as $key => $planValue) 
                            {
                    ?>
                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?=$planValue['planType']?></td>
                                    <td><?=$planValue['icon_class']?></td>
                                    <td><?=$planValue['threashold_amount']?></td>
                                    <td><?=$planValue['payable_amount']?></td>
                                    <td><?=$planValue['transaction_fee']?></td>
                                    <td>
                                <?php if(in_array('Plan_Delete', $roles))
                                         {
                                ?>
                                        <div class="col-lg-6">
                                    <a class="PlanDlt" id="<?= $planValue['planId'] ?>" href="#" name="delete">Delete >></a>
                                    </div>
                                <?php } 
                                else{
                                ?>
                                <div class="col-lg-6" data-toggle="tooltip" title="Not Permited">Delete </div>
                                <?php } if(in_array('Plan_Update', $roles))
                                         {
                                ?>
                                    <div class="col-lg-6">
                                    <a class="uptPlan" name="update" href="plan_update.php?id=<?php echo base64_encode($planValue['planId']);?>">Update >></a>
                                    </div>
                                <?php } 
                                else{
                                ?><div class="col-lg-6" data-toggle="tooltip" title="Not Permited">Update</div>
                                <?php } ?>

                                    </td>
                                    
                                </tr>
                                <?php
                                $i++;
                            }
                        }

                                ?>
                    <?php if(in_array('Plan_Add', $roles))
                             {
                    ?>
                    <div><th colspan="7"><a href="plan_insert.php">Add Plans >> </a></th></div>
                    <?php } 
                    else{
                    ?>
                    <div><th data-toggle="tooltip" title="Not Permited" colspan="7">Add Plans >></th></div>
                    <?php } ?>
                                
                    </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>


     <?php } ?>



<?php include('footer.php'); ?>