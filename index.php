<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
</head>
<body>
<!-- PHP Code -->
<?php
//Include header.php file
include ('include/header.php');
?>
	
<div style="margin-top: 50px;"></div>

<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3 mx-1 shadow">
				<img src="./img/info.jpg" style="width:100%; height: 250px;" alt="Information Image">
				<h5 class="text-center text-black-75 ">Get more information</h5>
				<a href="#">
					<button class="btn btn-success my-3" style="margin-left: 30%;">More Info</button>
				</a>
			</div>

			<div class="col-md-3 mx-1 shadow">
				<img src="./img/patient.jpg" style="width:100% ; height: 250px;" alt="Patient Image">
				<h5 class="text-center text-black-75">Book your doctor</h5>
				<a href="#">
					<button class="btn btn-success my-3" style="margin-left: 30%;">Book Now</button>
				</a>
			</div>
			
			<div class="col-md-3 mx-1 shadow">
				<img src="./img/doctor.jpg" style="width:100% ; height: 250px;" alt="Doctor Image">
				<h5 class="text-center text-black-75">We are Employing doctors</h5>
				<a href="#">
					<button class="btn btn-success my-3" style="margin-left: 25%;">Apply Now</button>
				</a>
			</div>
			
		</div>
	</div>
</div>

</body>
</html>