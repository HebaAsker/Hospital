<?php
include('include/connection.php');

if (isset($_POST['LogIn'])) {
	$Name=$_POST['Name'];
	$Email=$_POST['Email'];
	$Password=$_POST['Password'];

	$error=array();

	$q="SELECT * FROM doctors WHERE user_name='$Name' AND doctor_email='$Email' AND doctor_password='$Password'";
	$qq=mysqli_query($connect,$q);

	$row=mysqli_fetch_array($qq);

	if (empty($Name)) {
		$error['LogIn']="Enter user name";
	}else if (empty($Email)) {
		$error['LogIn']="Enter user email";
	}else if(empty($Password)){
		$error['LogIn']="Enter user password";
	}else if($row['doctor_status']=="Pendding"){
		$error['LogIn']="Please wait for the admin to confirm";
	}else if($row['doctor_status']=="Rejected"){
		$error['LogIn']="Try again later";
	}


	if (count($error)==0) {
		$query="SELECT * FROM doctors WHERE user_name='$Name' AND user_email='$Email' AND user_password='$Password'";
		$res=mysqli_query($connect,$query);

		if (mysqli_num_rows($res)) {
			echo"<script>alert('Done')</script>";

			$_SESSION['doctor']=$user_name; 

         	//header("Location: doctor.php");
		}else{
			echo"<script>alert('Invalide account')</script>";
		}
	}
}

if (isset($error['LogIn'])) {
	$l=$error['LogIn'];
	$show="<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
	$show="";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctors LogIn Page</title>
</head>
<body >
	<?php
      include("include/header.php");
	?>


	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-4">
					<h6 class="text-center my-5">Doctors LogIn</h6>
					<div>
						<?php echo $show;?>
					</div>
					<form method="post">
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

					<p>I don't have an account <a href="apply.php">Apply Now</a></p>

					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>