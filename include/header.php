<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hospital System</title>
	<!-- Bootstrap CDN Code -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- JQuery CDN Code -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <!-- Installl JQuery -->
    <script src="jquery-3.6.0.min.js"></script>

    <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

</head>
<body>

	<!-- Create the navigation bar -->
	<nav class="navbar navbar-expand-lg navbar-info bg-info">
		<h5 class="text-white">Hospital Management System</h5>
		<div class="mr-auto"></div>

		<ul class="navbar-nav">
			
			<?php
             if (isset($_SESSION['admin'])) {
                 
                 $user=$_SESSION['admin'];

             	echo '
			<li class="nav-item"><a href="#" class="nav-link text-white"> '.$user.' </a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white"> LogOut</a></li>  ' ;
             }else if(isset($_SESSION['doctor'])){
               $user=$_SESSION['doctor'];

             	echo '
			<li class="nav-item"><a href="#" class="nav-link text-white"> '.$user.' </a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white"> LogOut</a></li>  ' ;
             }
             else{
             	echo '<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
             	<li class="nav-item"><a href="admin.php" class="nav-link text-white">Admin</a></li>
			<li class="nav-item"><a href="doctor.php" class="nav-link text-white">Doctor</a></li>
			<li class="nav-item"><a href="#" class="nav-link text-white">Patient</a></li> ';
             }

			?>
			
		</ul>
		
	</nav>

</body>
</html>