<?php include ('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Orders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	require "connect.php";
	$app = mysqli_query($conn, "Select * from order_app, application, user, dev
								where order_app.id_app=application.id_app
								and order_app.id_user=user.id_user
								and order_app.id_dev=dev.id_dev
								and application.fee!=0");
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel=title">List Orders</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class= "table table-hover" >
							<thead>
								<tr>
									<th>Order's ID</th>
									<th>Application's ID</th>
									<th>Application's Name</th>
									<th>Application's Icon</th>
									<th>Customer's Name</th>
									<th>Date/time</th>
									<th>Developer's Name</th>
									<th>Fee</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($app as $key => $value) { ?>
									<tr>	
										<td>
											<?php echo $value['id_order']?>	
										</td>
										
										<td>
											<?php echo $value['id_app']?>
										</td>
										<td>
											<?php echo $value['name_app']?>
										</td>
										<td>
											<?php echo $value['icon']?>
										</td>
										<td>
											<?php echo $value['name_user']?>
										</td>
										<td>
											<?php echo $value['time']?>
										</td>
										<td>
											<?php echo $value['name_dev']?>
										</td>
										<td>
											<?php echo $value['fee']?>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						
					</div>
					<br>
					<div class="form-group">
						<div class="panel-heading">
							<h3 class="panel=title">Total</h3>
						</div>
						<table class= "table table-hover">
								<thead>
									<tr>
										<th>Total Costs</th>
										<th>Numbers of Orders</th>
									</tr>
								</thead>
								<tbody>
									<?php $x=0; $z=0; ?>
									
										<tr>
											<td>
												<?php foreach($app as $key => $value) { ?>
													<?php 
														$y = $value['fee'];
														$z = $z + $y;
													?>
												<?php } ?>
												<?php echo $z." VND"; ?>
											</td>
											<td>
												<?php foreach($app as $key => $value) { ?>
													<?php 
														$x = $x+1;	
													?>
												<?php } ?>
												<?php echo $x; ?>
											</td>
										</tr>
									
								</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<br><br><br>
</html>
<?php include('footer.php'); ?>