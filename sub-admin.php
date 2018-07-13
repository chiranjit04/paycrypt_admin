
<?php include('header.php');?>


<!-- <?php
//$data=array('merchant_enable_disable','merchant_details','box_enable_disable','box_details','coin_details','coinAdd','coinDel','coinUpdt','cred_details','cred_add','cred_del','cred_updt','plan_details','planAdd','planDel','planUpdt');
//print_r($data);
//$roles=implode(',', $data);
//echo $roles;
?> -->

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Sub-Admin <small>Login Information</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-8 b-r">
                                
                        <form role="form" action="sub_admin_insert.php" id="insert_sub" method="POST">

                                    <div class="form-group"><label>Admin Username</label> <input type="text" name="Username" placeholder="Username" class="form-control">
                                    </div>
                                    <div class="form-group"><label>Admin Email</label> <input type="email" name="Email" placeholder="admin@gmail.com" class="form-control">
                                    </div>
                                    <div class="form-group"><label>Admin Password</label> <input type="password" name="Password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="form-group"><label>Role</label> <input type="text" name="role" placeholder="Role" class="form-control">
                                    </div>
                                    <div class="form-group"><label>Status</label> <input type="status" name="status" placeholder="status" class="form-control">
                                    </div>

                                    <div class="col-sm-12">
                                        <ul style="list-style: none;">
                                            <li><label class="container"> Merchant Enable/Disable <input type="checkbox" class="checkbox-primary" value="Merchant_Enable/Disable" name="rest_page[]" id="merchant_enable_disable"><span class="checkmark"></span>  </label>
                                            </li>
                                            <li><label class="container">View Merchant Details <input type="checkbox"  name="rest_page[]" value="View_Merchant_Details" id="merchant_details"><span class="checkmark"></span> </label>

                                            <ul id="box_det" style="list-style: none; display: none;">
                                                <li><label class="container">Box Enable/Disable <input type="checkbox"  name="rest_page[]" value="Box_Enable/Disable" id="box_enable_disable"><span class="checkmark"></span>  </label></li>
                                                <li>
                                                    <label class="container">View Box Details <input type="checkbox"  name="rest_page[]" value="View_Box_Details" id="box_details"><span class="checkmark"></span> </label>
                                                </li>
                                            </ul>
                                            </li>
                                            <li>
                                            <label class="container">Coin Manager <input type="checkbox" value="Coin_Manager"  name="rest_page[]" id="coin_details"> <span class="checkmark"></span></label>
                                            <ul id="coin_det"  style="list-style: none; display: none;">
                                                <li>
                                                <label class="container">Coin Add <input type="checkbox" value="Coin_Add" name="rest_page[]" id="coinAdd"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Coin Delete <input type="checkbox" value="Coin_Delete"  name="rest_page[]" id="coinDel"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Coin Update <input type="checkbox" value="Coin_Update" name="rest_page[]" id="coinUpdt"> <span class="checkmark"></span></label>
                                                </li>
                                                </ul>
                                            </li>
                                            <li>
                                            <label class="container">Credential Manager <input type="checkbox" value="Credential_Manager"  name="rest_page[]" id="cred_details"> <span class="checkmark"></span></label>
                                            <ul id="cred_det" style="list-style: none; display: none;">
                                                <li>
                                                <label class="container">Credential Add <input type="checkbox" value="Credential_Add"  name="rest_page[]" id="cred_add"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Credential Delete <input type="checkbox" value="Credential_Delete" name="rest_page[]" id="cred_del"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Credential Update <input type="checkbox" value="Credential_Update" name="rest_page[]" id="cred_updt"> <span class="checkmark"></span></label>
                                                </li>
                                                </ul>
                                            </li>
                                            <li>
                                            <label class="container">Plan Manager <input type="checkbox" value="Plan_Manager" name="rest_page[]" id="plan_details"> <span class="checkmark"></span></label>
                                                <ul id="plan_det" style="list-style: none; display: none;">
                                                <li>
                                                <label class="container">Plan Add <input type="checkbox" value="Plan_Add"  name="rest_page[]" id="planAdd"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Plan Delete <input type="checkbox" value="Plan_Delete" name="rest_page[]" id="planDel"> <span class="checkmark"></span></label>
                                                </li>
                                                <li>
                                                <label class="container">Plan Update <input type="checkbox" value="Plan_Update" name="rest_page[]" id="planUpdt"> <span class="checkmark"></span></label>
                                                </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>

                                        
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" name="sub_insert" type="submit"><strong>Insert</strong></button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-lg-5">
                    <div class="ibox float-e-margins">
                        
                    
                    </div>
                </div>
            </div>
            
        </div>

<?php include('footer.php'); ?>


<script type="text/javascript">
    /*$('#checkbox1').change(function () {
        if (!this.checked) 
            $('#mercant').hide();
        else 
            $('#mercant').show();
    });

    $('#mercant1,#checkbox1').change(function () {
        if (!this.checked) 
        
           $('#box').hide();
        else 
            $('#box').show();
    });*/

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
<script src="js/plugins/validate/jquery.validate.min.js"></script>
<script>
         $(document).ready(function()
         {

            jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");

             $("#insert_sub").validate(
             {
                 rules: 
                 {
                     Username: {
                         required: true,
                         minlength: 4,
                         noSpace: true
                     },
                     Email: {
                         required: true,
                         email: true
                         
                     },
                     Password:{
                        required:true,
                        minlength:4
                     },
                     role: {
                         required: true  
                     },
                     status:{
                        required:true
                     }   
                 } 
             });
        });
    </script>