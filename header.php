<?php
session_start();
if(!isset($_SESSION['admn_id']))
{
    header("Location:index.php");
    exit();
} 

include('connection.php'); 
include('classes/Admin.php');

?>
<!DOCTYPE html>
<html>
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PayCrypt Dashboard</title>
    <link rel="bit" href="img/bit.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        .scroll{
            position: fixed;
        }
    </style>

</head>

<body onload="display_body()">
    <div id="wrapper">
    <?php
    $filename=basename($_SERVER['PHP_SELF']);
    $merchantPage=array('merchant.php','marchantDetails.php','boxall_details.php');
    $coinMangr=array('coin_manager.php','coin_update.php');
    $credencial=array('credential.php','cred_update.php');
    $coinPlan=array('coin_plans.php','plan_update.php','plan_insert.php');
    $sub_admin=array('admins-table.php','sub-admin.php','admin_update.php');
    ?>
        <nav class="navbar-default navbar-static-side scroll" role="navigation">
            
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" width="80px" height="80px" class="img-circle" src="img/a4.jpg" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['adnm']; ?></strong>
                             </span> <span class="text-muted text-xs block"><b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu">
                                <li><a href="logout.php" name="" >Logout</a></li>   
                            </ul>
                        </div>
                        <div class="text-center" ><h4><span id="ct" class="ct"></span></h4></div>
                    </li>
                    <?php if($_SESSION['role']=="admin"){ ?>
                    <li>
                        <li <?php if($filename=="dashboard.php"){ ?> class="active" <?php } ?>><a href="dashboard.php"><i class="fa fa-dashboard fa-lg"></i> <span class="nav-label">Dashboards</span></a></li>
                        
                    </li>
                    <li>
                        <li <?php if(in_array($filename, $merchantPage)){ ?> class="active" <?php } ?>><a href="merchant.php"><i class="fa fa-slideshare fa-lg"></i> <span class="nav-label">Merchant Info</span></a></li>
                        
                    </li>
                    <li>
                        <li <?php if(in_array($filename, $coinMangr)){ ?> class="active" <?php } ?>><a href="coin_manager.php"><i class="fa fa-money fa-lg"></i> <span class="nav-label">Coin Manager</span></a></li>
                        
                    </li>
                    <li>
                        <li <?php if(in_array($filename, $credencial)){ ?> class="active" <?php } ?>><a href="credential.php"><i class="fa fa-suitcase fa-lg"></i> <span class="nav-label">Credential</span></a></li>
                        
                    </li>
                    <li>
                        <li<?php if(in_array($filename, $coinPlan)){ ?> class="active" <?php } ?>><a href="coin_plans.php"><i class="fa fa-credit-card fa-lg"></i> <span class="nav-label">Plan Manager</span></a></li>
                        
                    </li>
                    <li>
                        <li<?php if(in_array($filename, $sub_admin)){ ?> class="active" <?php } ?>><a href="admins-table.php"><i class="fa fa-user-md fa-lg"></i> <span class="nav-label">Admin Manager</span></a>
                    </li>
                    </li>
                        
                   <?php
                   }
                   else {
                    ///if sub admin
                    $roles=explode(',',$_SESSION['rest_page']);
                       ?>
                       
                       <li>
                        <li <?php if($filename=="dashboard.php"){ ?> class="active" <?php } ?>><a href="dashboard.php"><i class="fa fa-dashboard fa-lg"></i> <span class="nav-label">Dashboards</span></a></li>
                        
                        </li>
                    <li>
                        <li <?php if(in_array($filename, $merchantPage)){ ?> class="active" <?php } ?>><a href="merchant.php"><i class="fa fa-slideshare fa-lg"></i> <span class="nav-label">Merchant Info</span></a></li>
                        
                    </li>
                
                <?php if(in_array('Coin_Manager', $roles))
                    {
                ?>
                    <li>
                        <li <?php if(in_array($filename, $coinMangr)){ ?> class="active" <?php } ?>><a href="coin_manager.php"><i class="fa fa-money fa-lg"></i> <span class="nav-label">Coin Manager</span></a></li>
                        
                    </li>
                    <?php } ?>
                    <?php if(in_array('Credential_Manager', $roles) || in_array('Credential_Add', $roles) || in_array('Credential_Delete', $roles) || in_array('Credential_Update', $roles))
                    {
                ?>
                    <li>
                        <li <?php if(in_array($filename, $credencial)){ ?> class="active" <?php } ?>><a href="credential.php"><i class="fa fa-suitcase fa-lg"></i> <span class="nav-label">Credential</span></a></li>
                        
                    </li>
                    <?php } ?>
                    <?php if(in_array('Plan_Manager', $roles) || in_array('Plan_Add', $roles) || in_array('Plan_Delete', $roles) || in_array('Plan_Update', $roles))
                    {
                ?>

                    <li>
                        <li<?php if(in_array($filename, $coinPlan)){ ?> class="active" <?php } ?>><a href="coin_plans.php"><i class="fa fa-credit-card fa-lg"></i> <span class="nav-label">Plan Manager</span></a></li>
                        
                    </li>
                    <?php } ?>
                    
                       <?php
                    } 
                   ?>

                  </ul>
            
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <?php include('header_top.php'); ?>
        </div>
        <div class="row">
            <div class="col-lg-12">

<script type="text/javascript"> 

function display_clock(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_body()',refresh)

}

function display_body() 
{
var x = new Date();
    var a = x.toDateString();
    //var b = x.getHours(); /*for 24 Hours*/
    var c = x.getMinutes();
    var d = x.getSeconds();

    var hours = x.getHours();
        hours = hours % 12; /*short time*/

document.getElementById('ct').innerHTML = a + ": " + hours + ":" + c+ ":" + d;
document.getElementById('ct').style.color="white";

tt=display_clock();
 }
</script>
