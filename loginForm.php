<?php session_start(); ?>



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





				<form action="./backend_file.php" class="rounded bg-white shadow p-5" method="POST">

					<h3 class="text-dark fw-bolder fs-4 mb-4">Login Form</h3>



					<div class="form-floating mb-3">

						<input type="number" class="form-control" placeholder="number" name="number" required>

						<label for="floatingInput">Mob Number</label>

					</div>



					<div class="form-floating mb-3">

						<input type="password" class="form-control" placeholder="Password" name="password" required>

						<label for="floatingPassword">Password</label>

					</div>





					<div class="d-flex align-items-center justify-content-between">

						<h6>Not a Customer <a href="./registrationForm.php">
							<br><strong class="text-primary text-decoration-none">Register</strong></a></h6>
						
						<h6><a href="./mailLocal/forgetpassword.php"><strong class="text-primary text-decoration-none">Forget 
						<br>	
						Password</strong></a></h6>

					</div>



					<button class="btn btn-warning mt-3" name="login">Login</button>



				</form>






				<img src="./assets/bottomlogo.png" alt="" width="250px" height="250px" style="margin-top:100px;">
				<br>
				<h6 style="margin-top: -67px;">

					APP BY <strong class="text-danger">SOULSOFT INFOTECH PVT LTD</strong>
				</h6>

			</div>

		</div>

		<h1>Rajeshahi</h1>

	</section>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>



</html>