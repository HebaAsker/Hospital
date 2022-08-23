<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Profile</title>
</head>
<body>
<?php
include('../include/header.php');
include('../include/connection.php');
$ad=$_SESSION['admin'];
$query="SELECT * FROM admin WHERE user_name='$ad'";
$res=mysqli_query($connect,$query);
while ($row=mysqli_fetch_array($res)) {
	$user_name=$row['user_name'];
	$user_email=$row['user_email'];
}
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left:-30px;">
				<?php 
                 include('sideNav.php');
				?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h5><?php echo $user_name; ?> Profile</h5>

							<form method="post" enctype="multipart/form-data">
								<img src="../img/admin.jpg" alt="Admin Profile Picture" class="col-md-12" style="height:20%; width: 20%;">
							</form>
						</div>
						<div class="col-md-6">
							<?php 
                              if (isset($_POST['change'])) {
                              	$Name=$_POST['Name'];

                              	if (empty($Name)) {
                              		// code...
                              	}else{
                              		$query="UPDATE admin SET user_name='$Name' WHERE user_name='$ad'";

                              		$res=mysqli_query($connect,$query);

                              		if ($res) {
                              			$_SESSION['admin']=$Name;
                              		}
                              	}
                              }


							?>
								<form method="post">
									<label>Change user name</label>
									<input type="text" name="Name" class="form-control" autocomplete="off" placeholder="Enter new user name"><br>
									<input type="submit" name="change" class="btn btn-success" value="Change">
								</form>


								<br>

								<form method="post">
									<label>Change user email</label>
									<input type="text" name="Email" class="form-control" autocomplete="off" placeholder="Enter new user email"><br>
									<input type="submit" name="change" class="btn btn-success" value="Change">
								</form><br>
							<?php

                             if (isset($_POST['change_password'])) {
                              	$old_password=$_POST['old_password'];
                              	$new_password=$_POST['new_password'];
                              	$con_password=$_POST['con_password'];

                              	$error=array();
                              	$old=mysqli_query($connect, "SELECT * FROM admin WHERE user_name='$ad'");

                              	$row=mysqli_fetch_array($old);
                              	$pass=$row['user_password'];

                              	if (empty($old_password)) {
                              		$error['p']="Enter old password";
                              	}else if(empty($new_password)){
                              		$error['p']="Enter new password";
                              		}else if (empty($con_password)){
                              		$error['p']="Enter confirm password";
                              	}else if($old_password!=$Password){
                              		$error['p']="Uncorrect old password, please try again";
                              	}
                              	else if($new_password!=$con_password){
                              		$error['p']="passwords don't match";}


                              		if(count($error)==0){
                              			$query="UPDATE admin SET user_password='$new_password' WHERE user_name='$ad'";

                              			mysqli_query($connect,$query);
                              		}
                              	
                              }


                              if (isset($error['p'])) {
                              			$e=$error['p'];

                              			$show="<h5 class='text-center alert alert-danger'>$e</h5>";
                              		}else{
                              			$show="";
                              		}
                          ?>
                                

                                <form method="post">
                                	<h5 class="text-center my-4">Change Password</h5>

                                	<div>
                                		<?php echo $show; ?>
                                	</div>
                                	<div class="form-group">
									<label>Old password</label>
									<input type="password" name="old_password" class="form-control"></div>

									<div class="form-group">
									<label>New password</label>
									<input type="password" name="new_password" class="form-control"></div>

									<div class="form-group">
									<label>Confirm password</label>
									<input type="password" name="con_password" class="form-control"></div>

									<input type="submit" name="change_password" class="btn btn-success" value="Change Password">
								</form><br>



							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>