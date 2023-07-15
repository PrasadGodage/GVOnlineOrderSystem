<?php include("../Admin/config.php"); ?>



<!DOCTYPE html>

<html lang="en">



<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

	<title>Registration Form</title>

</head>



<body>

	<section class="wrapper">

		<div class="container">

			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center mt-5">





				<form action="sendWp.php" class="rounded bg-white shadow p-5" method="GET">

					<h3 class="text-dark fw-bolder fs-4 mb-4">Forget Password</h3>

					<div class="form-floating mb-3">

						<input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>

						<label for="floatingInput">Name</label>

					</div>

					<div class="form-floating mb-3">

						<input type="number" class="form-control" name="mob" placeholder="number" required>

						<label for="floatingInput">Mob Number</label>

					</div>

					<div class="form-floating mb-3">

						<input type="email" class="form-control" name="email" placeholder="email" required>

						<label for="floatingInput">Email address</label>

					</div>




					<a class="btn btn-warning mt-3" type="submit" value="Send Password">
				</form>








				<img src="../assets/bottomlogo.png" alt="" width="250px" height="250px" style="margin-top:10px;">
				<br>
				<h6 style="margin-top: -67px;">

					APP BY <strong class="text-danger">SOULSOFT INFOTECH PVT LTD</strong>
				</h6>



			</div>

		</div>

	</section>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



	<script>
		// function validateForm() {

		// 	var password = document.getElementById("password").value;

		// 	var confirmPassword = document.getElementById("confirmPassword").value;

		// 	var mob = document.getElementById("mob").value;



		// 	if (mob.length !== 10) {

		// 		alert("Please enetr correct mobile number.");



		// 	}



		// 	if (password !== confirmPassword) {

		// 		alert("Passwords do not match!");



		// 	}





		// }
	</script>

</body>



</html>