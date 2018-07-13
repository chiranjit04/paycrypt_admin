<?php 
include('header.php'); 
include('classes/Credential.php');
?>

<div class="wrapper wrapper-content">
      	<div class="row">
      		<div class="ibox float-e-margins">
            	<div class="ibox-title">
					<h5>Update <small>Cedencial Update</small></h5>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-8 b-r"> 

                        <?php

                        $host_id=base64_decode($_REQUEST['id']);
                        $credFetch=$objCredential->credFetch($host_id);

                        if(count($credFetch)>0)
                        {
                        ?>
	                    <tr>
	                        <label>
	                              <td><h4>Host Name:</h4></td>
	                        </label> <td> <?= $credFetch['host_name'] ?> </td>
	                    </tr>
                                

                        <?php
                        }
                        ?>
                                    
						<form  style="position: center" action="cred_update2.php" method="post" enctype="multipart/form-data" id="cred_upt">
                        <input type="hidden" name="hid" value="<?= $_REQUEST['id'] ?>">
                        <div class="form-group">
                        <label>Host Name</label>
                        <input type="text" name="host_name" value="<?= $credFetch['host_name'] ?>" class="form-control" >
                        	
						</div>
                        <div class="form-group">
                        <label>Host Port</label>
                        <input type="text" name="host_port" value="<?= $credFetch['host_port'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Host User</label>
                        <input type="text" name="host_user" value="<?= $credFetch['host_user'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Host Pass</label>
                        <input type="text" name="host_pass" value="<?= $credFetch['host_pass'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Coin Name</label>
                        <input type="text" name="coin_name" value="<?= $credFetch['coin_name'] ?>" class="form-control">
                        </div>
                        
                                                            
                        <div style="margin-top: 20px;">

                        <button class="btn btn-sm btn-primary" name="cred_updt" type="submit" ><strong>Update</strong></button>
                        </div>
                    </form>
                    </div>
                    </div>
                    </div>
				</div>
			</div>
		</div>
	</div>





<?php include('footer.php'); ?>