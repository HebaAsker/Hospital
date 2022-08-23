<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
</head>
<body>
	<?php
     include('../include/header.php');
	?>

	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-30px;">
					<?php
                     include('sideNav.php');
                     include('../include/connection.php');
					?>
				</div>
				<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<h5 class="text-center">All Admins</h5>
                             <?php
                             $ad=$_SESSION['admin'];
                             $query=" SELECT * FROM admin WHERE user_name !='$ad'";
                             $res=mysqli_query($connect,$query);
                             $output="
                               <table class='table table-bordered'>
                               <tr>
                               <th>ID</th>
                               <th>User Name</th>
                               <th style='width:10%;'>Action</th>
                               <tr>
                              ";
                             if (mysqli_num_rows($res)<1) {$output .="<tr><td colspan'3' class'text-center'>No Admins</td> </tr>";}
                             	
                             

                             while ($row=mysqli_fetch_array($res)) {
                               $user_id=$row['user_id'];
                               $user_name=$row['user_name'];

                               $output .="
                                 <tr>
                                <td>$user_id</td>
                                <td>$user_name</td>
                                <td>
                               <a href='admin?user_id=$user_id'><button id='$user_id' class='btn btn-danger remove'>Remove</button></a>
									              </td>
                                ";
                                }

                             $output .="
                              </tr>
							                </table>
                             ";
                              
                              echo $output;

                              if (isset($_GET['user_id'])) {
                              	$user_id=$_GET['user_id'];
                              	$query="DELETE FROM admin WHERE user_id='$user_id'";
                              	mysqli_query($connect,$query);
                              }
                             ?>
						</div>
						<div class="col-md-6">

							<?php
							if (isset($_POST['add'])) {
								$Name=$_POST['Name'];
								$Email=$_POST['Email'];
								$Password=$_POST['Password'];
								

								$error=array();

								if (empty($Name)) {
									$error['u']="Enter Admin Name";
								} else if (empty($Email)) {
		                      $error['u']="Enter Admin email";
	              }else if(empty($Password)){
		                      $error['u']="Enter Admin password";
							  }

							  if(count($error)==0)
							  {
							  	$q="INSERT INTO admin(user_name,user_email,user_password) VALUES('$Name','$Email','$Password')";

							  	$result=mysqli_query($connect,$q);
							  	}
							  	}
							  

               if (isset($error['u'])) {
               	$er=$error['u'];
               	$show="<h5 class='text-center alert alert-danger'>$er</h5>";
               }else{
               	$show="";
               }
							?>
							<h5 class="text-center">Add Admin</h5>
							<form method="post" enctype="multipart/form-data">
								<div>
									<?php
									echo $show;?>
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
					   
					        <input type="submit" name="add" class="btn btn-success" value="Add New Admin">
						</div>
							</form>
						</div>
					</div>
				</div>	
				</div>

			</div>
		</div>
	</div>

</body>
</html>

