<?php
require('admin.php');
$username='';
$password='';
$firstname='';
$lastname='';
$email='';
$mobile='';
$dateofbirth='';
$gender='';

$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($conn,$_GET['id']);
	$res=mysqli_query($conn,"select * from user where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$username=$row['username'];
		$email=$row['email'];
		$mobile=$row['phone'];
		$password=$row['password'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $gender = $row['gender'];
        $dateofbirth = $row['dateofbirth'];
	}else{
		header('location:user_management.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$username=get_safe_value($conn,$_POST['username']);
	$email=get_safe_value($conn,$_POST['email']);
	$mobile=get_safe_value($conn,$_POST['mobile']);
	$password=get_safe_value($conn,$_POST['password']);
    $firstname=get_safe_value($conn,$_POST['firstname']);
	$lastname=get_safe_value($conn,$_POST['lastname']);
	$gender=get_safe_value($conn,$_POST['gender']);
	$dateofbirth=get_safe_value($conn,$_POST['dateofbirth']);
	


	$res=mysqli_query($conn,"select * from user where username='$username'");
	$check=mysqli_num_rows($res);


	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg = '<div class="alert alert-danger text-center">Sorry, Username already exist.</div>';
			}
		}else{
			$msg = '<div class="alert alert-danger text-center">Sorry, Username already exist.</div>';
		}
	}

	$resEmail=mysqli_query($conn,"select * from user where email='$email'");
	$checkEmail=mysqli_num_rows($resEmail);


	if($checkEmail>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($resEmail);
			if($id==$getData['id']){
			
			}else{
				$msgEmail= '<div class="alert alert-danger text-center">Sorry, Email already exist.</div>';
			}
		}else{
			$msgEmail= '<div class="alert alert-danger text-center">Sorry, Email already exist.</div>';
		}
	}

	$resphone=mysqli_query($conn,"select * from user where phone='$mobile'");
	$checkphone=mysqli_num_rows($resphone);


	if($checkphone>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($resphone);
			if($id==$getData['id']){
			
			}else{
				$msgphone= '<div class="alert alert-danger text-center">Sorry, Mobile already exist.</div>';
			}
		}else{
			$msgphone= '<div class="alert alert-danger text-center">Sorry, Mobile already exist.</div>';
		}
	}


	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$update_sql="update user set username='$username',password='$password',email='$email',phone='$mobile' ,firstname='$firstname',lastname='$lastname',gender='$gender',dateofbirth='$dateofbirth' where id='$id'";
			mysqli_query($conn,$update_sql);
		}else{
			mysqli_query($conn,"insert into user (username,password,email,phone,role,status,firstname,lastname,gender,dateofbirth) values('$username','$password','$email','$mobile',0,1,'$firstname','$lastname','$gender','$dateofbirth')");
		}
		header('location:admin.php');
		die();
	}
}
?>

<style>
.ast {
    color: red;
}

</style>
<div class="content" style=" margin-left: 270px; width:1280px;">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>USER MANAGEMENT FORM</strong><small> </small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <?php
								if (isset($msg)) {
									echo $msg;
								}
								?>
                            <div class="form-group">
                                <label for="username" class=" form-control-label">Username <h class="ast">*</h></label>
                                <input type="text" name="username" placeholder="Enter username" class="form-control"
                                    required value="<?php echo $username?>">
                            </div>
                            <div class="form-group">
                                <label for="firstname" class=" form-control-label">Firstname <h class="ast">*</h>
                                </label>
                                <input type="text" name="firstname" placeholder="Enter firstname" class="form-control"
                                    required value="<?php echo $firstname?>">
                            </div>
                            <div class="form-group">
                                <label for="lastname" class=" form-control-label">Lastname <h class="ast">*</h></label>
                                <input type="text" name="lastname" placeholder="Enter lastname" class="form-control"
                                    required value="<?php echo $lastname?>">
                            </div>
                            <div class="form-group">
                                <label for="gender" class=" form-control-label">Gender <h class="ast">*</h></label>
                                <input type="text" name="gender" placeholder="Enter Gender" class="form-control"
                                    required value="<?php echo $gender?>">
                            </div>
                            <div class="form-group">
                                <label for="dateofbirth" class=" form-control-label">Date Of Birth <h class="ast">*</h>
                                </label>
                                <input type="Date" name="dateofbirth" placeholder="Enter Date Of Birth"
                                    class="form-control" required value="<?php echo $dateofbirth?>">
                            </div>
                            <?php
								if (isset($msgphone)) {
									echo $msgphone;
								}
								?>

                            <div class="form-group">
                                <label for="Mobile" class=" form-control-label">Mobile <h class="ast">*</h></label>
                                <input type="tel" name="mobile" id="mobile" placeholder="+20 (___) ___-_____" class="form-control" 
                                    required value="<?php echo $mobile?>">
                            </div>

                            <?php
								if (isset($msgEmail)) {
									echo $msgEmail;
								}
								?>
                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email <h class="ast">*</h></label>
                                <input type="email" name="email" placeholder="Enter email" class="form-control" required
                                    value="<?php echo $email?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class=" form-control-label">Password <h class="ast">*</h></label>
                                <input type="password" name="password" placeholder="Enter password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                    required value="<?php echo $password?>">
                            </div>
                            <button id="payment-button" name="submit" type="submit"
                                class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">SUBMIT</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('mobile').addEventListener('input', function(e) {
    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});
</script>
