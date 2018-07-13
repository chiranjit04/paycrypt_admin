<?php
include('classes/merchant.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Here is how to load a bootstrap modal as soon as the document is ready </h2>
  <!-- Trigger the modal with a button -->


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <?php
                            $email=base64_decode($_REQUEST['id']);
                            $secrete=$objMerchat->getSecretKye($email);
                            //print_r($secrete);
                            if(count($secrete)>0)
                            {
                                foreach ($secrete as $key => $secretekey) 
                                {

                                    ?>
                                    
                                        <div class="modal-body">
                                            <?=$secretekey['boxName'] ?>
                                        </div>
                                    
                                        <?php 
                                        
                                }
                            }
                            ?>


        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
$(document).ready(function(){
   $("#myModal").modal();
});
</script>

</body>
</html>
<div class="col-ms-3">
<a class="delCoin" href="coin_Del.php?id=<?= base64_encode($coinValue['coin_id'])?>" name="delete">Delete</a></div>
