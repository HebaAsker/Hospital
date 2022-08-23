<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php
include("../include/header.php");
?>

<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left:-30px;">
				<?php
                 include("sideNav.php");
				?>
			</div>
			<div class="col-md-10">
				<h5 class="text-center">Job Request</h5>
				<div id="show"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

	show();
	function show(){
		$.ajax({
          url:"ajax_job.php",
          method:"POST",
          success:function(data){
          	$("#show").html(data);
          }
		});
	}
});</script>
</body>
</html>