<?php 
include('header.php'); 
include('classes/planManager.php');
?>
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Coin Plans <small>New Plans</small></h5>
                        
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-8 b-r">
   
                                <form  style="position: center" action="plan_insert2.php" method="post" enctype="multipart/form-data" id="planinsrt">
                                    <div class="form-group">
                                    <label>Plan Type</label>
                                    <input type="text" name="planType" placeholder="Plan Type" class="form-control">	
									</div>

                                    <div class="form-group">
                                    <label>Icons</label>
                                    <input type="text" name="icon_class" placeholder="Icons" class="form-control">
                                    </div>

									<div class="form-group">
                                    <label>Threashold Amount</label>
                                    <input type="text" name="threashold_amount" placeholder="Threashold Amount" class="form-control">
                                    </div>

                                    <div class="form-group">
                                    <label>Payable Amount</label>
                                    <input type="text" name="payable_amount" placeholder="Payable Amount" class="form-control">
                                    </div>

                                    <div class="form-group">
                                    <label>Transaction Fee</label>
                                    <input type="text" name="transaction_fee" placeholder="Transaction Fee" class="form-control">
                                    </div>
									
                                                                        
                                    <div style="margin-top: 20px;">

                                    <button class="btn btn-sm btn-primary" name="plan_insert" type="submit" ><strong>Insert</strong></button>

                                    
                                    </div>

                                </form>
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

             $("#planinsrt").validate(
             {
                 rules: 
                 {
                     planType: {
                         required: true,
                         minlength: 4
                     },
                     icon_class: {
                         required: true                         
                     },
                     threashold_amount:{
                        required:true,
                        numbers:true
                     },
                     payable_amount: {
                         required: true,
                         numbers:true  
                     },
                     transaction_fee:{
                        required:true,
                        numbers:true
                     }   
                 } 
             });
        });
    </script>