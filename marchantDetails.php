<?php 
include('header.php'); 
include('classes/merchant.php');
?>
<style type="text/css">
  .stitched {
   padding: 5px;
   margin: 10px;
   background: #304050;
   color: #fff;
   font-size: 21px;
   font-weight: bold;
   line-height: 1.3em;
   border: 1px dashed #fff;
   border-radius: 0px;
   box-shadow: 0 0 0 4px , 2px 1px 6px 4px rgba(10, 10, 0, 0.5);
   text-shadow: -1px -1px #aa3030;
   font-weight: normal;
}



</style>
  
<?php if($_SESSION['role']=="admin"){ ?>
  <div class="wrapper wrapper-content">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="text-center"><div class="stitched">Merchant Details</div></h1>
                 <table class="table table-striped table-bordered table-hover dataTables-example" id="merchantDtl">

<?php
     $email=base64_decode($_REQUEST['id']);
     $merchantDet=$objMerchat->marchantDetail($email);
     //print_r($merchantDet);
     if(count($merchantDet)>0)
     {
?>
                    
                    <tr>
                       <label>
                           <td>User_id:</td>
                       </label> <td> <?= $merchantDet['user_id'] ?> </td>
                    </tr>
                    
                    <tr>
                        <label>
                           <td>IpAddress:</td>
                       </label><td><?= $merchantDet['ipAddress'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Firstname:</td>
                       </label><td><?= $merchantDet['firstname'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Lastname:</td>
                       </label><td><?= $merchantDet['lastname'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Email:</td>
                       </label><td><?= $merchantDet['email'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Company Name:</td>
                       </label><td><?= $merchantDet['company_name'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Company Website:</td>
                       </label><td><?= $merchantDet['company_website'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Phone:</td>
                       </label><td><?= $merchantDet['phone'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Photo:</td>
                       </label><td><img src="http://13.127.235.223/paycrypt_revised/uploads/"<?=$merchantDet['photo'] ?> width='100' height='125' /></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Monetiser:</td>
                       </label><td><?= $merchantDet['monetiser'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Business Type:</td>
                       </label><td><?= $merchantDet['business_type'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Google SecreteKye:</td>
                       </label><td><?= $merchantDet['googlesecretekey'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Currency:</td>
                       </label><td><?= $merchantDet['currency'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>User Plan:</td>
                       </label><td>
                       <?= $objMerchat->getMerchantPlan($merchantDet['user_plan'])  ?>
                       </td>
                    </tr>
                    <?php
                  }
                  else
                  {
                    ?>
                        <tr>
                            <td colspan="4">No Data Found.</td>
                        </tr>
                    <?php
                  }
                    ?>
                    
                </table>
            </div>
       </div>
       <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12" id="loadbox">
               <h1 class="text-center"><div class="stitched">Merchant Keys and boxes</div></h1>

               <table class="table table-striped table-bordered table-hover dataTables-example" id="merchantKey">
               <thead>
                        <tr>
                            <th><p class="fa fa-pencil fa-lg"></p> SL.No.</th>
                            <th><p class="fa fa-key fa-lg"></p> Public Key</th>
                            <th><p class="fa fa-key fa-lg"></p> Private Key</th>
                            <th><p class="fa fa-eye fa-lg"></p> Boxes</th>
                            <th><p class="fa fa-universal-access fa-lg"></p> Box Status</th>                           
                        </tr>
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
                                        <td><a href="boxall_details.php?id=<?php echo base64_encode($secretekey['privateKey']); ?>&pub=<?php echo base64_encode($secretekey['publicKey']); ?>&e=<?php echo base64_encode($secretekey['email']); ?>" >View Details</a> 
                                        </td>
                                        
                                        <td>
                                        <div class="dropdown">
                                            <a href="javascript::void(0)"
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
                                                 <li><a class="boxInactive" BoxId="<?=$secretekey['boxID'] ?>" href="#" uemail="<?= $email ?>">Inactive</a></li>
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
           </div>
       </div>
   </div>
   <?php
 }
 else
 {
  $roles=explode(',',$_SESSION['rest_page']);
   ?>

   <div class="wrapper wrapper-content">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="text-center"><div class="stitched">Merchant Details</div></h1>
                 <table class="table table-striped table-bordered table-hover dataTables-example" id="merchantDtl">

<?php
     $email=base64_decode($_REQUEST['id']);
     $merchantDet=$objMerchat->marchantDetail($email);
     //print_r($merchantDet);
     if(count($merchantDet)>0)
     {
?>
                    
                    <tr>
                       <label>
                           <td>User_id:</td>
                       </label> <td> <?= $merchantDet['user_id'] ?> </td>
                    </tr>
                    
                    <tr>
                        <label>
                           <td>IpAddress:</td>
                       </label><td><?= $merchantDet['ipAddress'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Firstname:</td>
                       </label><td><?= $merchantDet['firstname'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Lastname:</td>
                       </label><td><?= $merchantDet['lastname'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Email:</td>
                       </label><td><?= $merchantDet['email'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Company Name:</td>
                       </label><td><?= $merchantDet['company_name'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Company Website:</td>
                       </label><td><?= $merchantDet['company_website'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Phone:</td>
                       </label><td><?= $merchantDet['phone'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Photo:</td>
                       </label><td><img src="http://13.127.235.223/paycrypt_revised/uploads/"<?=$merchantDet['photo'] ?> width='100' height='125' /></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Monetiser:</td>
                       </label><td><?= $merchantDet['monetiser'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Business Type:</td>
                       </label><td><?= $merchantDet['business_type'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Google SecreteKye:</td>
                       </label><td><?= $merchantDet['googlesecretekey'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>Currency:</td>
                       </label><td><?= $merchantDet['currency'] ?></td>
                    </tr>
                    <tr>
                        <label>
                           <td>User Plan:</td>
                       </label><td>
                       <?= $objMerchat->getMerchantPlan($merchantDet['user_plan'])  ?>
                       </td>
                    </tr>
                    <?php
                  }
                  else
                  {
                    ?>
                        <tr>
                            <td colspan="4">No Data Found.</td>
                        </tr>
                    <?php
                  }
                    ?>
                    
                </table>
            </div>
       </div>
       <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12" id="loadbox">
               <h1 class="text-center"><div class="stitched">Merchant Keys and boxes</div></h1>

               <table class="table table-striped table-bordered table-hover dataTables-example" id="merchantKey">
               <thead>
                        <tr>
                            <th>SL.No.</th>
                            <th>Public Key</th>
                            <th>Private Key</th>
                            <th>Boxes</th>
                            <th>Box Status</th>                           
                        </tr>
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
                                    <?php if(in_array('View_Box_Details', $roles))
                                            {
                                    ?>
                                        <td><a href="boxall_details.php?id=<?php echo base64_encode($secretekey['privateKey']); ?>&pub=<?php echo base64_encode($secretekey['publicKey']); ?>&e=<?php echo base64_encode($secretekey['email']); ?>">View Details</a> 
                                        </td>
                                        <?php } ?>
                                  <?php if(in_array('Box_Enable/Disable', $roles))
                                      {
                                  ?>
                                        <td>
                                        <div class="dropdown">
                                            <a href="javascript::void(0)"
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
                                                 <li><a class="boxInactive" BoxId="<?=$secretekey['boxID'] ?>" href="#" uemail="<?= $email ?>">Inactive</a></li>
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
                                    <?php } ?>



                                    </tr>
                                        <?php 
                                        $i++;
                                }
                            }
                            ?>




                        </tbody>
                    </thead>
                   
               </table>
           </div>
       </div>
   </div>
   <?php } ?>
   
   <?php include('footer.php'); ?>
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

    
   

