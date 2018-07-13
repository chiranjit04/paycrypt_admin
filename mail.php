
<?php
include('config/connect.php');

if(isset($_POST['submit']))
{

$to="chiranjitdebnath04@gmail.com";
$from=trim($_POST['uemail']);
$subject="Enquiery";
$message=trim($_POST['message']);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: '.$from . "\r\n";
$headers .= 'Cc: help@gmail.com' . "\r\n";
if(mail($to,$subject,$message,$headers))
{
	echo "Sent Successfull";
}
else
{
	echo "string";
}
}
else
{
	echo "NOt sent";
}
?>