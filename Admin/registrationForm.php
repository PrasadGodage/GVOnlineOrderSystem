<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<title>Document</title>
</head>

<body>
	<section class="wrapper">
		<div class="container">
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center mt-5">


				<form action="backend_file.php" class="rounded bg-white shadow p-5" method="POST">
					<h3 class="text-dark fw-bolder fs-4 mb-4">Registration Form</h3>
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
					<div class="form-floating mb-3">
						<input type="text" class="form-control" placeholder="Address" name="address" required>
						<label for="floatingInput">Address</label>
					</div>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" placeholder="PIN CODE" name="pincode" required>
						<label for="floatingInput">Pin Code</label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="floatingPassword" name="password" required>
						<label for="floatingPassword">Password</label>
					</div>
					<div class="form-floating mb-3">
						<input type="password" class="form-control" id="floatingPassword" required>
						<label for="floatingPassword">Confirm Password</label>
					</div>

					<div>
						<h6>Already Customer <a href="./loginForm.php"> <strong class="text-primary text-decoration-none">Login</strong></a></h6>
					</div>

					<button class="btn btn-warning mt-3" name="register">Register</button>

				</form>

			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>