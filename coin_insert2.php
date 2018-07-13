<?php
include('classes/coinManager.php');

if(isset($_POST['insert']))
{
	$coinExist=$objcoinManager->coinCheck($_POST['coin_name']);

	if($coinExist==0)
	{
		$coinImg=$_FILES['coin_image'];
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
				if(move_uploaded_file($_FILES['coin_image']['tmp_name'], $path))
				{
					$coin_image=$path;
					$coin_name=$_POST['coin_name'];
					$coin_abb=$_POST['coin_abbrv'];
					$coinCreat=$objcoinManager->coinInsert($coin_name,$coin_image,$coin_abb);
					if($coinCreat>0)
					{
						header('location:coin_manager.php?i=yes');
					}
					else
					{
						header('location:coin_insert.php?i=fail');
					}

				}
				else
				{
				echo "file not uploded";
				}
			}
			else
			{
				echo "Image size should be less then 1024kb";
			}
		}
		else
		{
			echo "Please upload valid file";
		} 
		}
	else
	{
		header('location:coin_insert.php?c=fail');
	}
	
}

?>