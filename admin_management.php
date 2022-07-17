<?php
require('admin.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($conn,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($conn,$_GET['operation']);
		$id=get_safe_value($conn,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}

		$update_status_sql="update admin_users set status='$status' where id='$id'";
		mysqli_query($conn,$update_status_sql);
	}
	
	if($type=='delete'){
		$id=get_safe_value($conn,$_GET['id']);
		$delete_sql="delete from admin_users where id='$id'";
		mysqli_query($conn,$delete_sql);
	}
}

$sql="select * from admin_users where role=2 order by id asc";
$res=mysqli_query($conn,$sql);
?>
<div class="content" style=" margin-left: 270px; width:1280px;">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">ADMIN MANAGEMENT </h4>
                        <h4 class="box-link"><a href="manage_admin_management.php">ADD ADMIN</a> </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>

                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
                                    <tr>

                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['username']?></td>
                                        <td><?php echo $row['password']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['mobile']?></td>

                                        <td>
                                            <?php
								if($row['status']==0){
									echo "<span class='badge badge-complete'><a href='?type=status&operation=active&id=".$row['id']."'>Active</a></span>&nbsp;";
								}else{
									echo "<span class='badge badge-pending'><a href='?type=status&operation=deactive&id=".$row['id']."'>Deactive</a></span>&nbsp;";
								}
								echo "<span class='badge badge-edit'><a href='manage_admin_management.php?id=".$row['id']."'>Edit</a></span>&nbsp;";
								
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								
								?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
