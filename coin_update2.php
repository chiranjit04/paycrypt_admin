<?php
include('classes/coinManager.php');
if(isset($_POST['update']))
{
		$coinImg=$_FILES['image'];
		$imagArr=array('jpg','png','jpeg','gif');
		$imgType=$coinImg['type'];
		$imageName=$coinImg['name'];
		$imgExt=pathinfo($imageName,PATHINFO_EXTENSION);
		$fileSize=$coinImg['size'];
		$path='upload/';
		$path=$path.date('ymdHis').".".$imgExt;

		if(in_array($imgExt, $imagArr))
		{
			if($fileSize>=1024)
			{
				if(move_uploaded_file($_FILES['image']['tmp_name'], $path))
				{
					$name=$_POST['name'];
					$coin_image=$path;
					$coin_abb=$_POST['abb'];
					$cid=base64_decode($_POST['cid']);
					$coinUpdt=$objcoinManager->coinUpdate($cid,$name,$coin_image,$coin_abb);
					if($coinUpdt>0)
					{
						header('location:coin_update.php?u=yes');
					}
					else
					{
						echo "failed update";
					}
				}
				else
				{
					echo "file not uploaded";
				}
			}
			else
			{
				echo "Image size should be less then 1024kb";
			}
		}
		else
		{
			echo "plz upload valid file";
		}
}



?>