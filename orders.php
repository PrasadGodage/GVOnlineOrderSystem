<?php

session_start();



// error_reporting(0);
include('./Admin/config.php');


$username = $_SESSION['username'];
$landmark = $_SESSION['landmark'];
$userid = $_SESSION['userid'];
$address = $_SESSION['address'];
$pincode = $_SESSION['pincode'];
$name = $_SESSION['name'];




if (!isset($_SESSION['username'])) {

	header("location:./loginForm.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Add to Cart</title>
</head>
<?php include('navabar.php'); ?>

<body>
	<div class="container mb-4">
		<h1 class="my-4 text-center text-warning">Your Orders</h1>
		<div class="row">

			<?php
			include('./Admin/config.php');

			$sql = "SELECT * FROM `ordermaster` WHERE `userid` = '$userid'";
			$result = mysqli_query($con, $sql);


			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) { ?>

					<div class="col-md-8 mb-3">

						<div class="card">


							<div>
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">

										<h6>Order id: <?php echo $row['orderid']; ?></h6>
										<h6>Status: <span class="text-danger"><?php echo $row['orderstatus']; ?></span></h6>
									</div>
								</div>
								<div class="card-body">

									<p class="card-text">Address: <strong><?php echo $row['address']; ?></strong></p>
									<p class="card-text">Landmark: <strong><?php echo $row['landmark']; ?></strong></p>
									<p class="card-text">Pincode: <strong><?php echo $row['pincode']; ?></strong></p>
								</div>
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-center">

										<p class="card-text">Bill Amount - Rs. <strong class="text-success"><?php echo $row['orderbillamount']; ?></strong></p>
										<button class="btn btn-sm btn-success">Review <span></span></button>
									</div>
								</div>



							</div>
						</div>
					</div>

			<?php
				}
			}

			?>



		</div>
	</div>







</body>

</html>