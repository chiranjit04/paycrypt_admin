<?php 
include('header.php'); 
include('classes/Credential.php');
?>
<style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button 
    { 
    -webkit-appearance: none; 
    margin: 0; 
    }
</style>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Credencial <small>New Credencial</small></h5>
                        
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-8 b-r">
   
                                <form  style="position: center" id="cred_insrt" action="cred_insert2.php" method="post" enctype="multipart/form-data" id="credInser">
                                    <div class="form-group">
                                    <label>Host Name</label>
                                    <input type="text" step="any" min="0" name="host_name" placeholder="Host Name" id="host_name" class="form-control" onkeypress="return isNumberKey(event)">	
									</div>

                                    <div class="form-group">
                                    <label>Host Port</label>
                                    <input type="text" id="host_port" name="host_port" placeholder="Host Port" class="form-control">
                                    </div>

									<div class="form-group">
                                    <label>Host User</label>
                                    <input type="text" name="host_user" placeholder="Host User" class="form-control">
                                    </div>

                                    <div class="form-group">
                                    <label>Host Pass</label>
                                    <input type="text" name="host_pass" placeholder="Host Pass" class="form-control">
                                    </div>

                                    <div class="form-group">
                                    <label>Coin Name</label>
                                    <input type="text" name="coin_name" placeholder="Coin Name" class="form-control">
                                    </div>
									
                                                                        
                                    <div style="margin-top: 20px;">

                                    <button class="btn btn-sm btn-primary" name="Cred_insert" type="submit" ><strong>Insert</strong></button>

                                    
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

             $("#cred_insrt").validate(
             {
                 rules: 
                 {
                     host_name: {
                         required: true,
                         minlength: 4
                     },
                     host_port: {
                         required: true,
                         email: true
                         
                     },
                     host_user:{
                        required:true,
                        minlength:4
                     },
                     host_pass: {
                         required: true  
                     },
                     coin_name:{
                        required:true
                     }   
                 } 
             });
        });
    </script>
    <script type="text/javascript">
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
       }
    </script>