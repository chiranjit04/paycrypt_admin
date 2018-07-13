<?php 
include('header.php'); 
include('classes/Credential.php');
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
      		<div class="ibox float-e-margins">
            	<div class="ibox-title">
                            <div>
                            <?php
                            if(isset($_REQUEST['cred']))
                            {
                            if($_REQUEST['cred']=="yes")
                            {
                            ?>
                            <div class="success-msg">
                            <i class="fa fa-check"></i>
                            <?php echo "Credencial Successfully Inserted";?>
                            </div>
                            <?php
                            }
                            }
                            ?>
                            <?php
                            if(isset($_REQUEST['c']))
                            {
                            if($_REQUEST['c']=="yes")
                            {?>
                            <div class="success-msg">
                            <i class="fa fa-check"></i>
                            <?php echo "Credencial Update Successfull";?>
                            </div>
                            <?php
                            }
                            }

                            ?>
                            </div>
					<h5>Credencial <small>Manage Credencial</small></h5>
                            <table class="table table-striped table-bordered table-hover dataTables-example " id="credent">

							<thead>
                        <tr>
                            <th><h5>#</h5></th>
                            <th>Host Name</th>
                            <th>Host Port</th>
                            <th>Host User</th>
                            <th>Host Pass</th>
                            <th>Coin Name</th>
                            <th>Actions</th>                      
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    	$credential=$objCredential->credDetails();
                    	if(count($credential)>0)
                    	{	$i='1';
                    		foreach ($credential as $key => $credValue) 
                    		{
                    			?>
                    			<tr>
	                    			<td><?php echo $i; ?></td>
	                				<td><?=$credValue['host_name']?></td>
	                				<td><?=$credValue['host_port']?></td>
	                				<td><?=$credValue['host_user']?></td>
                                    <td><?=$credValue['host_pass']?></td>
	                				<td><?=$credValue['coin_name']?></td>
                                    <td>
                                        <div class="col-lg-6">
                                    <a class="credDlt fa fa-trash fa-lg" id="<?= $credValue['host_id'] ?>" href="#" name="delete"></a>
                                    </div>

                                    <div class="col-lg-6">
                                    <a class="uptCred fa fa-edit fa-lg" name="update" href="cred_update.php?id=<?php echo base64_encode($credValue['host_id']);?>"></a>
                                    </div>

                                    </td>
                    				
                    			</tr>
                    		<?php
                    		$i++;
                    		}
                    	}

                    ?>
                    <div><th colspan="7"><a href="cred_insert.php" class="fa fa-plus-circle fa-lg"> Add Credencial</a></th></div>
                    			
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
                            if(isset($_REQUEST['cred']))
                            {
                            if($_REQUEST['cred']=="yes")
                            {
                            ?>
                            <div class="success-msg">
                            <i class="fa fa-check"></i>
                            <?php echo "Credencial Successfully Inserted";?>
                            </div>
                            <?php
                            }
                            }
                            ?>
                            <?php
                            if(isset($_REQUEST['c']))
                            {
                            if($_REQUEST['c']=="yes")
                            {?>
                            <div class="success-msg">
                            <i class="fa fa-check"></i>
                            <?php echo "Credencial Update Successfull";?>
                            </div>
                            <?php
                            }
                            }

                            ?>
                            </div>
                    <h5>Credencial <small>Manage Credencial</small></h5>
                            <table class="table table-striped table-bordered table-hover dataTables-example " id="credent">

                            <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Host Name</th>
                            <th>Host Port</th>
                            <th>Host User</th>
                            <th>Host Pass</th>
                            <th>Coin Name</th>
                            <th>Actions</th>                      
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $credential=$objCredential->credDetails();
                        if(count($credential)>0)
                        {   $i='1';
                            foreach ($credential as $key => $credValue) 
                            {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?=$credValue['host_name']?></td>
                                    <td><?=$credValue['host_port']?></td>
                                    <td><?=$credValue['host_user']?></td>
                                    <td><?=$credValue['host_pass']?></td>
                                    <td><?=$credValue['coin_name']?></td>
                                    <td>
                                <?php if(in_array('Credential_Delete', $roles))
                                         {
                                ?>
                                    <div class="col-lg-6">
                                    <a class="credDlt" id="<?= $credValue['host_id'] ?>" href="#" name="delete">Delete >></a>
                                    </div>
                                <?php } 
                                else{ ?><div data-toggle="tooltip" title="Not Permited">Delete</div>
                                <?php } if(in_array('Credential_Update', $roles))
                                         {
                                ?>
                                    <div class="col-lg-6">
                                    <a class="uptCred" name="update" href="cred_update.php?id=<?php echo base64_encode($credValue['host_id']);?>">Update >></a>
                                    </div>
                                <?php } 
                                else {?>
                                    <div data-toggle="tooltip" title="Not Permited">Update</div>
                                    <?php }?>
                                    </td>
                                    
                                </tr>
                            <?php
                            $i++;
                            }
                        }

                    ?>
                    <?php if(in_array('Credential_Update', $roles))
                            {
                    ?>
                    <div><th colspan="7"><a href="cred_insert.php">Add Credencial >> </a></th></div>
                    <?php } ?>
                                
                    </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php include('footer.php'); ?>
<script src="js/plugins/sweetalert/sweetalert.min.js"></script>