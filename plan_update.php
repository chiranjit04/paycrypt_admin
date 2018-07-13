<?php
include('header.php');
include('classes/planManager.php');
?>
      <div class="wrapper wrapper-content">
      	<div class="row">
      		<div class="ibox float-e-margins">
            	<div class="ibox-title">
					<h5>Plans Updates <small>Update Plans</small></h5>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-8 b-r">
                                
                                                
                                <?php
                            	$planId=base64_decode($_REQUEST['id']);
                            	$planFetch=$objPlan->fetchPlan($planId);
                            	if(count($planFetch)>0)
                            	{
                            
								?>                 
						<form  style="position: center" action="plan_update2.php" method="post" enctype="multipart/form-data" id="coin_upt">
                    			<input type="hidden" name="pid" value="<?= $_REQUEST['id'] ?>">

								<div class="form-group">
								<label>Plan Type</label>
								<input type="text" name="planType" value="<?= $planFetch['planType'] ?>" class="form-control">	
								</div>

								<div class="form-group">
								<label>Update Icon</label>
								<input type="text" name="icon" value="" class="form-control">	
								</div>


								<div class="form-group">
								<label>Threashold Amount</label>
								<input type="text" name="threashold_amount" value="<?= $planFetch['threashold_amount'] ?>" class="form-control">
								</div>

                                <div class="form-group">
                                <label>Payable Amount</label>
                                <input type="text" name="payable_amount" value="<?= $planFetch['payable_amount'] ?>" class="form-control">
                                </div>

                                <div class="form-group">
                                <label>Transaction Fee</label>
                                <input type="text" name="transaction_fee" value="<?= $planFetch['transaction_fee'] ?>" class="form-control">
                                </div>
                                <?php
                                }
                                ?> 

		                        <div style="margin-top: 20px;">
		                        <button class="btn btn-sm btn-primary" name="plan_update" type="submit" ><strong>Update</strong></button>
		                        </div>

			                    </form>
			                    </div>
								<div class="col-sm-4 col-md-4 col-lg-4">
								
			                    <label>Icon</label>
			                    <div><?= $planFetch['icon_class'] ?></div>
                    </div>
                    </div>
                    </div>
				</div>
			</div>
		</div>
	</div>


<?php include('footer.php'); ?>