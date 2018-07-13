<?php
include('classes/merchant.php');?>
<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<h2 class="text-center">Merchant Keys and boxes</h2>

               <table class="table" id="merchantKey">
               <thead>
                        <tr>
                            <th>SL.No.</th>
                            <th>Public Key</th>
                            <th>Private Key</th>
                            <th>Boxes</th>
                            <th>Box Status</th>                           
                        </tr>
                        <tbody>
               <table class="table" id="merchantKey">
               <thead>
                        
                        <tbody>
                            <?php
                            $email=base64_decode($_REQUEST['id']);
                            $secrete=$objMerchat->getSecretKye($email);
                            //echo "<pre>";
                            //print_r($secrete);
                            if(count($secrete)>0)
                            {
                                $i=1;
                                foreach ($secrete as $key => $secretekey) 
                                {

                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?= $secretekey['publicKey'] ?> </td>
                                        <td><?= $secretekey['privateKey'] ?></td>
                                        <td><a href="boxall_details.php?id=<?php echo base64_encode($secretekey['privateKey']); ?>">View Details</a> 
                                        </td>
                                       
                                        <td>
                                        <div class="dropdown">
                                            <a href="#"
                                            <?php 
                                          $BoxStatus=$objMerchat->boxStatus($secretekey['boxID']);

                                            if($BoxStatus['active']==1)
                                                { 
                                                   ?>
                                                   class="dropdown-toggle btn btn-primary btn-xs";
                                                   <?php
                                                } 
                                                else if($BoxStatus['active']==0)
                                                { 
                                                    ?>
                                                   class="dropdown-toggle btn btn-danger btn-xs";
                                                   <?php
                                                } 
                                                ?> 
                                            
                                             data-toggle="dropdown">
                                             <?php if($BoxStatus['active']==1)
                                             {
                                              echo "Active"; 
                                              } 
                                              else 
                                              if($BoxStatus['active']==0)
                                                { 
                                                    echo "Inactive";
                                                 } 
                                            ?> 
                                                <b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                            <?php 
                                            if($BoxStatus['active']==1)
                                                { 
                                             ?>
                                                 <li><a class="boxInactive" BoxId="<?= $secretekey['boxID'] ?>" href="#" uemail="<?= $email ?>">Inactive</a></li>
                                                    <?php
                                                } 
                                                else if($BoxStatus['active']==0){ 
                                                    ?>
                                                    <li><a class="boxActive" BoxId="<?= $secretekey['boxID'] ?>" href="#" uemail="<?= $email ?>">Active</a></li>
                                                    <?php
                                                } ?>
                                            </ul>
                                        </div>


                                        </td>



                                    </tr>
                                        <?php 
                                        $i++;
                                }
                            }
                            ?>
						</tbody>
                    </thead>
                   
               </table>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/sweetalert/sweetalert.min.js"></script>
<script src="js/merchant.js"></script>

<!----modal---->
   <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Box Details</h4>
                </div>
                <div class="modal-body" id="modelVal">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


             