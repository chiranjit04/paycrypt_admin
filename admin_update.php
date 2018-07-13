<?php 
include('header.php');
include('classes/Sub_Admin.php');
?>

<div class="wrapper wrapper-content">
      	<div class="row">
      		<div class="ibox float-e-margins">
            	<div class="ibox-title">
					<h5>Admin Updates <small>Update Subadmins</small></h5>
                        <div class="ibox-content">
                            <div class="row">
                            <div class="col-sm-8 b-r">

                            <?php
                            $restpage='';
                            $admin_id=base64_decode($_REQUEST['id']);
                            $admnFetch=$objSubadmin->adminFetch($admin_id);
                            if(count($admnFetch)>0)
                            {
                            	?>
                            	<tr>
                                    <label>
                                          <td><h4><?= $admnFetch['role'] ?>:</h4></td>
                                    </label> <td> <?= $admnFetch['admin_name'] ?> </td>
                                </tr>
                                <?php                               
                                
                              }

                            ?>
                            <?php
                            $restpage=explode(',', $admnFetch['rest_page']);
                            
                              ?>
                            <form  style="position: center" action="admin_update2.php" method="POST" enctype="multipart/form-data" id="admin_updt">
                    <input type="hidden" name="aid" value="<?= $_REQUEST['id'] ?>">
                        <div class="form-group">
                        <label>Admin Name</label>
                        <input type="text" name="name" value="<?= $admnFetch['admin_name'] ?>" class="form-control" >
                        	
						</div>
                        <div class="form-group">
                        <label>Role</label>
                        <input type="text" name="role" value="<?= $admnFetch['role'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text"  value="<?= $admnFetch['email'] ?>" name="email" class="form-control">
                        </div>
                        <div class="col-sm-12">
                                        <ul style="list-style: none;">
                                            <li><label class="container"> Merchant Enable/Disable <input type="checkbox" class="checkbox-primary" value="Merchant_Enable/Disable"<?php if(in_array('Merchant_Enable/Disable', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="merchant_enable_disable"><span class="checkmark"></span>  </label>

                                            </li>
                                            <li><label class="container">View Merchant Details <input type="checkbox"   value="View_Merchant_Details"<?php if(in_array('View_Merchant_Details', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="merchant_details" > <span class="checkmark"></span> </label>

                                            <ul id="box_det" style="list-style: none;">
                                                <li><label class="container">Box Enable/Disable <input type="checkbox"  name="rest_page[]" value="Box_Enable/Disable"<?php if(in_array('Box_Enable/Disable', $restpage)){ ?> checked="checked" <?php } ?> id="box_enable_disable"><span class="checkmark"></span>  </label></li>
                                                <li>
                                                    <label class="container">View Box Details <input type="checkbox"  name="rest_page[]" value="View_Box_Details"<?php if(in_array('View_Box_Details', $restpage)){ ?> checked="checked" <?php } ?> id="box_details"><span class="checkmark"></span> </label>
                                                </li>
                                            </ul>
                                            </li>
                                            <li>
                                            <label class="container">Coin Manager <input type="checkbox" value="Coin_Manager"<?php if(in_array('Coin_Manager', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="coin_details"> <span class="checkmark"></span></label>
                                            <ul id="coin_det"  style="list-style: none;">
                                                <li>
                                                <label class="container">Coin Add <input type="checkbox" value="Coin_Add"<?php if(in_array('Coin_Add', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="coinAdd"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Coin Delete <input type="checkbox" value="Coin_Delete"<?php if(in_array('Coin_Delete', $restpage)){ ?> checked="checked" <?php } ?>  name="rest_page[]" id="coinDel"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Coin Update <input type="checkbox" value="Coin_Update"<?php if(in_array('Coin_Update', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="coinUpdt"> <span class="checkmark"></span></label>
                                                </li>
                                                </ul>
                                            </li>
                                            <li>
                                            <label class="container">Credential Manager <input type="checkbox" value="Credential_Manager"<?php if(in_array('Credential_Manager', $restpage)){ ?> checked="checked" <?php } ?>  name="rest_page[]" id="cred_details"> <span class="checkmark"></span></label>
                                            <ul id="cred_det" style="list-style: none;">
                                                <li>
                                                <label class="container">Credential Add <input type="checkbox" value="Credential_Add"<?php if(in_array('Credential_Add', $restpage)){ ?> checked="checked" <?php } ?>  name="rest_page[]" id="cred_add"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Credential Delete <input type="checkbox" value="Credential_Delete"<?php if(in_array('Credential_Delete', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="cred_del"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Credential Update <input type="checkbox" value="Credential_Update"<?php if(in_array('Credential_Update', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="cred_updt"> <span class="checkmark"></span></label>
                                                </li>
                                                </ul>
                                            </li>
                                            <li>
                                            <label class="container">Plan Manager <input type="checkbox"<?php if(in_array('Plan_Manager', $restpage)){ ?> checked="checked" <?php } ?> value="Plan_Manager" name="rest_page[]" id="plan_details"> <span class="checkmark"></span></label>
                                                <ul id="plan_det" style="list-style: none;">
                                                <li>
                                                <label class="container">Plan Add <input type="checkbox" value="Plan_Add"  name="rest_page[]"<?php if(in_array('Plan_Add', $restpage)){ ?> checked="checked" <?php } ?> id="planAdd"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Plan Delete <input type="checkbox" value="Plan_Delete"<?php if(in_array('Plan_Delete', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="planDel"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Plan Update <input type="checkbox" value="Plan_Update"<?php if(in_array('Plan_Update', $restpage)){ ?> checked="checked" <?php } ?> name="rest_page[]" id="planUpdt" ><span class="checkmark"></span></label>
                                                </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>

                                        
                                    </div>
                                                            
                        <div style="margin-top: 20px;">

                        <button class="btn btn-sm btn-primary" name="update" type="submit" ><strong>Update</strong></button>
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
<script type="text/javascript">

$("#merchant_details").on('change',function(){
        $("#box_det").toggle(function(){
            var isChecked = $("#merchant_details").prop('checked');
            if(!isChecked)
            {
                $("#box_enable_disable").removeAttr('checked');
                $("#box_details").removeAttr('checked');

                //$("#box_enable_disable").attr("checked", "checked");
                //$("#box_details").attr("checked", "checked");
            }
            
        });
    })

    $("#coin_details").on('change',function(){
        $("#coin_det").toggle(function(){
            var isChecked = $("#coin_details").prop('checked');
            if(!isChecked)
            {
                $("#coinAdd").removeAttr('checked');
                $("#coinDel").removeAttr('checked');
                $("#coinUpdt").removeAttr('checked');

            }
            
        });
    })

    $("#cred_details").on('change',function(){
        $("#cred_det").toggle(function(){
            var isChecked = $("#cred_details").prop('checked');
            if(!isChecked)
            {
                $("#cred_add").removeAttr('checked');
                $("#cred_del").removeAttr('checked');
                $("#cred_updt").removeAttr('checked');

            }
            
        });
    })

    $("#plan_details").on('change',function(){
        $("#plan_det").toggle(function(){
            var isChecked = $("#plan_details").prop('checked');
            if(!isChecked)
            {
                $("#planAdd").removeAttr('checked');
                $("#planDel").removeAttr('checked');
                $("#planUpdt").removeAttr('checked');

            }
            
        });
    })
    
</script>
                            
