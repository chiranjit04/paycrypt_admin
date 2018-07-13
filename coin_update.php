<?php 
include('header.php'); 
include('classes/coinManager.php');
?>

	<div class="wrapper wrapper-content">
      	<div class="row">
      		<div class="ibox float-e-margins">
            	<div class="ibox-title">
					<h5>Update <small>Coin Update</small></h5>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-8 b-r">
                                <?php
                                if(isset($_REQUEST['u']))
                                {
                                    if($_REQUEST['u']=="yes")
                                    {?>
                                        <div class="success-msg">
                                        <i class="fa fa-check"></i>
                                        <?php echo "Coin Successfully Updated";?>
                                        </div>
                                    <?php
                                    }
                                }

                                ?>
                                                
                                <?php
                                $coin_id=base64_decode($_REQUEST['id']);
                                $coinFetch=$objcoinManager->coinFetch($coin_id);
                                
                                
                                //echo "<pre>";
                                //print_r($coinFetch);
                                if(count($coinFetch)>0)
                                { 
                            	?>					
                                <tr>
                                    <label>
                                          <td><h4>coin name:</h4></td>
                                    </label> <td> <?= $coinFetch['coin_name'] ?> </td>
                                </tr>
                                <?php
                                }
                                ?>                  
						<form  style="position: center" action="coin_update2.php" method="post" enctype="multipart/form-data" id="coin_upt">
                    <input type="hidden" name="cid" value="<?= $_REQUEST['id'] ?>">
                        <div class="form-group">
                        <label>Coin Name</label>
                        <input type="text" name="name" value="<?= $coinFetch['coin_name'] ?>" class="form-control" >
                        	
						</div>
                        <div class="form-group">
                        <label>Coin Abbreviation</label>
                        <input type="text" name="abb" value="<?= $coinFetch['coin_abbrv'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file"  value="<?= $coinFetch['coin_image'] ?>" name="image" >

                        </div>
                                                            
                        <div style="margin-top: 20px;">

                        <button class="btn btn-sm btn-primary" name="update" type="submit" ><strong>Update</strong></button>
                        </div>
                    </form>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <img src="<?=$coinFetch['coin_image'] ?>" width='150' height='175'/>
                    </div>
                    </div>
                    </div>
				</div>
			</div>
		</div>
	</div>


<?php include('footer.php'); ?>
<script src="js/plugins/validate/jquery.validate.min.js"></script>
<script>
         $(document).ready(function()
         {

             $("#coin_upt").validate(
             {
                 rules: 
                 {
                     name: {
                         minlength: 4
                     },
                     image:{
                        required: true
                     }          
                     
                 }
                  
                 
             });
        });
    </script>