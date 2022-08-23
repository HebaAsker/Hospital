<?php
include('include/connection.php');

if (isset($_POST['Apply'])) {
	$first_name=$_POST['fName'];
	$second_name=$_POST['sName'];
	$user_name=$_POST['Name'];
	$doctor_email=$_POST['Email'];
	$doctor_gender=$_POST['gender'];
	$doctor_phone=$_POST['Phone'];
	$doctor_country=$_POST['country'];
	$doctor_password=$_POST['Password'];
	$confirm_password=$_POST['con_password'];

	$error=array();

	if (empty($first_name)) {
	  $error['Apply']="Enter Your First Name";
	}else if (empty($second_name)) {
	  $error['Apply']="Enter Your second Name";
	}else if(empty($user_name)){
	  $error['Apply']="Enter Your Name";
	}else if(empty($doctor_email)){
	  $error['Apply']="Enter Your Email";
	}else if($doctor_gender==""){
	  $error['Apply']="Select Your Gender";
	}else if(empty($doctor_phone)){
	  $error['Apply']="Enter Your Phone Number";
	}else if($doctor_country==""){
	  $error['Apply']="Select Your Country";
	}else if(empty($doctor_password)){
	  $error['Apply']="Enter Your Password";
	}else if($confirm_password!=$doctor_password){
	  $error['Apply']="passwords don't match";
	}
       if(count($error)==0){
         $query="INSERT INTO doctors (frist_name, second_name, user_name,doctor_email, doctor_gender, doctor_phone,doctor_country, doctor_password, doctor_salary, doctor_data, doctor_status) VALUES('$first_name','$second_name','$user_name','$doctor_email','$doctor_gender','$doctor_phone','$doctor_country','$doctor_password','0',Now(),'Pendding')";

         $result=mysqli_query($connect,$query);

         if ($result) {
         	echo"<script>alert('You have successfully applied')</script>"; 

         	header("Location: doctor.php");
         }else{
                echo"<script>alert('Faild')</script>";
         }
       }
}

if (isset($error['Apply'])) {
	$s=$error['Apply'];

	$show="<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
	$show="";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Apply</title>
</head>
<body>
<?php
include("include/header.php");
?>

<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6 jumbotron my-2">
					<h6 class="text-center my-5">Apply Now</h6>
					<div>
						<?php echo $show;?>
					</div>
					<form method="post">
						<div class="form-group">
							<label>First Name</label>
							<input type="text" name="fName" class="form-control" autocomplete="off" placeholder="Enter your first name" value="<?php if(isset($_POST['fName'])) echo $_POST['fName'];  ?>">
						</div>
						<div class="form-group">
							<label>Second Name</label>
							<input type="text" name="sName" class="form-control" autocomplete="off" placeholder="Enter your second name" value="<?php if(isset($_POST['sName'])) echo $_POST['sName'];  ?>">
						</div>
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="Name" class="form-control" autocomplete="off" placeholder="Enter your name" value="<?php if(isset($_POST['user_name'])) echo $_POST['user_name'];  ?>">
						</div>

						<div class="form-group">
						<label>Email</label>
						<input type="email" name="Email" class="form-control" autocomplete="off" placeholder="Enter your Email" value="<?php if(isset($_POST['doctor_email'])) echo $_POST['doctor_email'];  ?>">
					</div>

					<div class="form-group">
						<label>Select Gender</label>
						<select name="gender" class="form-control">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="number" name="Phone" class="form-control" autocomplete="off" placeholder="Enter your phone number" value="<?php if(isset($_POST['doctor_phone'])) echo $_POST['doctor_phone'];  ?>">
					</div>
					<div class="form-group">
						<label>Select Country</label>
						<select name="country" class="form-control">
							<option value="">Select Country</option>
							<option value="Egypt">Egypt</option>
							<option value="France">France</option>
							<option value="Russis">Russis</option>
						</select>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="Password" class="form-control" placeholder="Enter your password">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="con_password" class="form-control" placeholder="Confirm your password">
					</div>
					<input type="submit" name="Apply" class="btn btn-success" value="Apply">
					<p>Already have an account <a href="doctor.php">Click here</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>