<?php 
include('header.php'); 
include('classes/merchant.php');
//echo "<pre>";
//print_r($objMerchat->merchantLists());
?>
  
  <?php if($_SESSION['role']=="admin"){ ?>
    <div class="wrapper wrapper-content">
      <div class="row">
         <div class="col-lg-12" id="loaddata">
                 <table class="table table-striped table-bordered
                table-hover dataTables-example " id="merchantTbl">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th><p class="fa fa-users fa-lg"></p> Merchant Name</th>
                            <th><p class="fa fa-envelope fa-lg"></p> Email</th>
                            <th><p class="fa fa-eye fa-lg"></p> Action</th>
                            <th><p class="fa fa-universal-access fa-lg"></p> Status</th>
                            
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
                                        <td> <?= $valueMerchant['firstname'] ?> </td>
                                        <td> <?= $valueMerchant['email'] ?>     </td>
                                        <td><a href="marchantDetails.php?id=<?php echo base64_encode($valueMerchant['email']); ?>"  >View Details</a></td>
                                        <td>

                                        <div class="dropdown">
                                            <a href="javascript::void(0)"
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
                                ?>

                                <?php
                               }
                              else 
                              {
                                    ?>
                                <tr>
                                    <td colspan="4">No Merchant Found.</td>
                                </tr>
                                <?php
                            }
                            ?>
                  </tbody>
                </table>
            </div>
       </div>
   </div>
<?php include('footer.php'); ?>
<script>
        $(document).ready(function(){
            $('#merchantTbl').DataTable({
                pageLength: 10,
                responsive: true
            });

        });

    </script>
   <?php 
 } 
 else
 {
  $roles=explode(',',$_SESSION['rest_page']);
   ?>
   <div class="wrapper wrapper-content">
      <div class="row">
         <div class="col-lg-12" id="loaddata">
                 <table class="table table-striped table-bordered
                table-hover dataTables-example " id="merchantTbl1">
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
                                        <td> <?= $valueMerchant['firstname'] ?> </td>
                                        <td> <?= $valueMerchant['email'] ?>     </td>
                                  <?php if(in_array('View_Merchant_Details', $roles))
                                          {
                                  ?>
                                        <td><a href="marchantDetails.php?id=<?php echo base64_encode($valueMerchant['email']); ?>"  >View Details</a></td>
                                  <?php }
                                  else{
                                    ?>
                                    <td data-toggle="tooltip" title="Not Permited">View Details</td>
                                    <?php
                                  }
                                  if(in_array('Merchant_Enable/Disable', $roles))
                                          {
                                  ?>
                                        <td>
                                        <div class="dropdown">
                                            <a href="javascript::void(0)"
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
                                        <?php }else{
                                         ?>
                                        <td data-toggle="tooltip" title="Not Permited">Active/Inactive</td>
                                        <?php }?>
                                    </tr>

                                    <?php
                                    $i++;
                                }
                                
                               }
                              else 
                              {
                                    ?>
                                <tr>
                                    <td colspan="4">No Merchant Found.</td>
                                </tr>
                                <?php
                            }
                            ?>
                  </tbody>
                </table>
            </div>
       </div>
   </div>     
                  
<?php include('footer.php'); ?>
    <script>
        $(document).ready(function(){
            $('#merchantTbl1').DataTable({
                pageLength: 10,
                responsive: true
            });

        });

    </script>
    <?php } ?>
    