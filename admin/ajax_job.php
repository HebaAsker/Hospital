<?php
include("../include/connection.php");
$query="SELECT * FROM doctors WHERE doctor_status='Pendding' ORDER BY doctor_data ASC";
$res=mysqli_query($connect,$query);

$output="";

$output=."
<table class='table table-bordered'>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Second Name</th>
		<th>User Name</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Phone</th>
		<th>Country</th>
		<th>Data Registered</th>
	</tr>
";

if (mysqli_num_rows($res)<1) {
	$output.="
    <tr>
	  <td colspan='8'>Now job requests yet</td>
    </tr>
	";
	}

	while ($row=mysqli_fetch_array($res)) {
		$output="
          <tr>
	<td>".$row['doctor_id']."</td>
	<td>".$row['first_name']."</td>
	<td>".$row['second_name']."</td>
	<td>".$row['user_name']."</td>
	<td>".$row['doctor_email']."</td>
	<td>".$row['doctor_gender']."</td>
	<td>".$row['doctor_phone']."</td>
	<td>".$row['doctor_country']."</td>
	<td>".$row['doctor_data']."</td>
	<td>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<button id='".$row['id']."' class='btn btn-success approve'>Approve</button>
				</div>
				<div class="col-md-6">
					<button id='".$row['id']."' class='btn btn-danger reject'>Rejected</button>
				</div>
			</div>
		</div>
	</td>

		";
	}
    $output.="
</tr>
</table>
    "
	echo $output;
?>
