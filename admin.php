<!-- This code to designe the admin page -->
<?php
session_start();

//include connection.php file
include('include/connection.php');

if (isset($_POST['LogIn'])) {
	$user_name=$_POST['Name'];
	$user_email=$_POST['Email'];
	$user_password=$_POST['Password'];

	$error=array();

	if (empty($user_name)) {
		$error['admin']="Enter user name";
	}else if (empty($user_email)) {
		$error['admin']="Enter user email";
	}else if(empty($user_password)){
		$error['admin']="Enter user password";
	}

	if (count($error)==0) {
		$query= "SELECT * FROM admin WHERE user_name='$user_name' AND user_email='$user_email' AND user_password='$user_password'";

		$result=mysqli_query($connect,$query);

		if (mysqli_num_rows($result)==1) {
			echo "<script>alert('Success LogIn')</script>";

			//start session for the user
			$_SESSION['admin']=$user_name;

			header("Location: admin/index.php");
			exit();
		}
		else
		{ 
			echo "<script> alert('Invaid user_name or password') </script>";
		}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin LogIn Page</title>
</head>
<body>
<!-- PHP Code -->
<?php
//Include header.php file
include ('include/header.php');
?>

<div style="margin-top:35px;"></div>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 jumbotron">
				<form method="post" class="my-2">

					<div>
                	<?php
                	if (isset($error['admin'])) {
                		$sh=$error['admin'];

                		$show="<h6 class='alert alert-danger'>$sh</h6>";

                	}else{
                		$show='';
                	}
                	echo $show;

                	?>
                </div>


					<div class="form-group">
						<label>User Name</label>
						<input type="text" name="Name" class="form-control" autocomplete="off" placeholder="Enter your name">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="Email" class="form-control" autocomplete="off" placeholder="Enter your Email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="Password" class="form-control">
					</div>
					<input type="submit" name="LogIn" class="btn btn-success" value="LogIn">
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>

</body>
</html>