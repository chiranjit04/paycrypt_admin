<?php 
include('header.php');
include('classes/Sub_Admin.php');
?>

<div class="wrapper wrapper-content">
      	<div class="row">
      		<div class="ibox float-e-margins">
            	<div class="ibox-title">

            	<h5>Admin's Table <small>Manage Sub-Admins</small></h5>
                            <table class="table table-striped table-bordered table-hover dataTables-example " id="credent">

                        <thead>
                        <tr>
                        	<th><h5>#</h5></th>
                            <th>Admin Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                            </tr>
                   		</thead>
                    	<tbody>
                    	<?php
                		$subadm=$objSubadmin->adminTable();
                		if(count($subadm)>0)
                		{
                			$i='1';
                			foreach ($subadm as $key => $subVal)
                			{
                    	?>
                    	<tr>
                    		<td><?php echo $i; ?></td>
                    		<td><?= $subVal['admin_name'] ?></td>
                    		<td><?= $subVal['role'] ?></td>
                    		<td><?= $subVal['email'] ?></td>
                    		<td>
                    			<div class="col-lg-6">
                    				<a href="" class="adminDel fa fa-trash fa-lg"></a>
                    			</div>
                    			<div class="col-lg-6 ">
                    				<a class="adminUp fa fa-edit fa-lg" href="admin_update.php?id=<?php echo base64_encode($subVal['admn_id']);?>"></a>
                    			</div>


                    		</td>

                    	</tr>


                    	<?php
                    	$i++;
		                    }
		                }

                    	?>
                    	<td colspan="5"><a href="sub-admin.php" class="fa fa-plus-circle fa-lg">Add Admin</a></td>
                    	</tbody>
                    	</table>
              	</div>
			</div>
		</div>
	</div>
<?php include('footer.php'); ?>
