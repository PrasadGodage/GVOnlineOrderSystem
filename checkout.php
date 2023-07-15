<?php

session_start();
error_reporting(0);
include('./Admin/config.php');

$amt = $_GET['amt'];
$username = $_SESSION['username'];
$landmark = $_SESSION['landmark'];
$userid = $_SESSION['userid'];
$address = $_SESSION['address'];
$pincode = $_SESSION['pincode'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];






if (!isset($_SESSION['username'])) {

	header("location:./loginForm.php");
}

// if (isset($_GET['payment'])) {
// 	echo "<script>
// 				alert('Sorry Currently not accept Orders');
// 				alert('Orders accept from 1 July');
// 				alert('Thanks for your support');
// 				window.location.href='./header.php';
// 				</script>";
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<title>Checkout</title>
</head>
<?php include('nav1.php'); ?>
<body>
	<section class="wrapper">
		<div class="container" style="margin-bottom: 70px;">
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center mt-5">
				<form action="razorpay/pay.php" class="rounded bg-white shadow p-5" method="GET">
					<h3 class="text-dark fw-bolder fs-4 mb-4">CheckOut</h3>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="name" placeholder="Enter Your Name" disabled>
						<label for="floatingInput"><?php echo $name; ?></label>
						<input type="hidden" class="form-control" name="ordername" value="<?php echo $name; ?>">
					</div>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" name="mob" placeholder="number" disabled>
						<label for="floatingInput"><?php echo $username; ?></label>
						<input type="hidden" class="form-control" name="ordermob" value="<?php echo $username; ?>" placeholder="number">
					</div>
					<div class="input-group form-floating mb-3">
						<input type="text" class="form-control" name="address" placeholder="Address">
						<!-- <span class="input-group-text"><a href="https://www.google.com/maps"><i class="material-icons nav__icon">add_location_alt</i></a></span> -->
						<label for="floatingInput"><?php echo $address; ?></label>
						<input type="hidden" class="form-control" name="orderaddress" placeholder="Address" value="<?php echo $address; ?>">
					</div>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" placeholder="Address" name="landmark">
						<label for="floatingInput"><?php echo $landmark; ?></label>
						<input type="hidden" class="form-control" name="orderlandmark" value="<?php echo $landmark; ?>">
					</div>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" placeholder="PIN CODE" name="pincode">
						<label for="floatingInput"><?php echo $pincode; ?></label>
						<input type="hidden" class="form-control" name="orderpincode" value="<?php echo $pincode; ?>">
					</div>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" placeholder="Total Amount" name="amount" disabled>
						<label for="floatingInput">Rs.<?php echo $amt ?></label>
						<input type="hidden" class="form-control" name="orderamt" value="<?php echo $amt; ?>">
					</div>
					<button class="btn btn-primary" type="button" onclick="getLocation()" onkeypress="<?php $btnn = 'submit'; ?>">Get Live Location</button>
					<input type="hidden" id="latitude" name="lat" readonly required>
					<input type="text" id="longitude" name="lon" readonly required>
					<input type="hidden" class="form-control" name="uid" value="<?php echo $userid; ?>">
					<input type="hidden" class="form-control" name="email" value="<?php echo $email; ?>">
					<br>
					<input class="btn btn-success mt-3" name="payment" type="<?php if ($btnn == 'submit') {
																					echo $btnn;
																				} else {
																					echo 'hidden';
																				} ?>">
				</form>
			</div>
		</div>
	</section>




	<script>
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition, showError);
			} else {
				console.log("Geolocation is not supported by this browser.");
			}
		}

		function showPosition(position) {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			var accuracy = position.coords.accuracy;



			alert("Your live location successfully fetched", "Latitude: " + latitude, "Longitude: " + longitude);


			var locationInput = document.getElementById("latitude");
			locationInput.value = (latitude);

			var longitudeInput = document.getElementById("longitude");
			longitudeInput.value = (longitude);
		}

		function showError(error) {
			switch (error.code) {
				case error.PERMISSION_DENIED:
					console.log("User denied the request for Geolocation.");
					break;
				case error.POSITION_UNAVAILABLE:
					console.log("Location information is unavailable.");
					break;
				case error.TIMEOUT:
					console.log("The request to get user location timed out.");
					break;
				case error.UNKNOWN_ERROR:
					console.log("An unknown error occurred.");
					break;
			}
		}

		console.log('Check')
		console.log(latitude);
		console.log(longitude);
	</script>

</body>

</html>