<?php
include('classes/merchant.php');
?>
<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

                <table class="table table-striped table-bordered
                table-hover dataTables-example" id="merchantTbl">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Merchant Name</th>
                            <th>Email</th>
                            <th>Action</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $merchant=$objMerchat->merchantLists();
                            if(count($merchant)>0)
                            {
                                $i=1;
                                foreach ($merchant as $key => $valueMerchant) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td> <?= $valueMerchant['firstname'] ?></td>
                                        <td> <?= $valueMerchant['email'] ?>    </td>
                                        <td><a href="marchantDetails.php?id=<?php echo base64_encode($valueMerchant['email']); ?>"  >View Details</a></td>
                                        <td>

                                        <div class="dropdown">
                                            <a href="#"
                                            <?php 
                                            if($valueMerchant['ustatus']==1)
                                                { 
                                                   ?>
                                                   class="dropdown-toggle btn btn-primary btn-xs";
                                                   <?php
                                                } 
                                                else if($valueMerchant['ustatus']==0)
                                                { 
                                                    ?>
                                                   class="dropdown-toggle btn btn-danger btn-xs";
                                                   <?php
                                                } 
                                                ?> 
                                            
                                             data-toggle="dropdown">
                                             <?php if($valueMerchant['ustatus']==1)
                                             {
                                              echo "Active"; 
                                              } 
                                              else 
                                              if($valueMerchant['ustatus']==0)
                                                { 
                                                    echo "Inactive";
                                                 } 
                                            ?> 
                                                <b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                            <?php 
                                            if($valueMerchant['ustatus']==1)
                                                { 
                                             ?>
                                                 <li><a class="merchantInactive" merchantId="<?=$valueMerchant['user_id'] ?>" href="#">Inactive</a></li>
                                                    <?php
                                                } 
                                                else if($valueMerchant['ustatus']==0){ 
                                                    ?>
                                                    <li><a class="merchantActive" merchantId="<?=$valueMerchant['user_id'] ?>" href="#">Active</a></li>
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
                            else {
                                    ?>
                                <tr>
                                    <td colspan="4">No Merchant Found.</td>
                                </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
               
                
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/sweetalert/sweetalert.min.js"></script>
<script src="js/merchant.js"></script>
<script>
        $(document).ready(function(){
            $('#merchantTbl').DataTable({
                pageLength: 10,
                responsive: true
            });

        });

    </script>
