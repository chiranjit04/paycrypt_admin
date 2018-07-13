<?php
session_start();
if(isset($_SESSION['adminId']))
{
    header("Location:dashboard.php");
} 
include('classes/Admin.php');
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PAYCRYPT | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        .bg{
            background-repeat: no-repeat;
            background-size: auto;
            background-size: 1470px 760px;
        }
        .log{
            color: white;
        }
    </style>

</head>

<body background="img/bite.jpg" class="bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">P-₹</h1>

            </div>
            <div class="log">
            <h3>Welcome to PAYCRYPT</h3>
            <p>Crypto Wallet Panal.
            </p>
            <p>Login in. To see it in action.</p>
            </div>
            <div>
                <?php
                if(isset($_REQUEST['l']))
                {
                if($_REQUEST['l']=="fail")
                {
                ?>
                <div class="warning-msg">
                <i class="fa fa-warning"></i>
                <?php echo "Username or password Wrong";?>
                </div>
                <?php
                }
                }
                ?>
            </div>
            <form class="m-t" role="form" action="index2.php" method="POST">
            
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Username" required="">
                </div>

                <div class="form-group">
                    <input type="password" name="pass" class="form-control" placeholder="Password" required="">
                </div>

                <button type="submit" name="login" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#" style="color: white;"><small>Forgot password?</small></a>
                
            </form>
            <p class="m-t" style="color: white;"> <small>Paycrypt Admin Panal &copy; 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
