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
	<section class="wrapper">
		<div class="container">
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center mt-5">


				<form action="backend_file.php" class="rounded bg-white shadow p-5" method="POST">
					<h3 class="text-dark fw-bolder fs-4 mb-4">CheckOut</h3>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="name" placeholder="Enter Your Name" disabled>
						<label for="floatingInput">Name</label>
					</div>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" name="mob" placeholder="number" disabled>
						<label for="floatingInput">Mob Number</label>
					</div>

					<div class="input-group form-floating mb-3">
						<input type="text" class="form-control" name="address" placeholder="Address" required>
						<span class="input-group-text"><a href="https://www.google.com/maps"><i class="material-icons nav__icon">add_location_alt</i></a></span>
						<label for="floatingInput">Address</label>




					</div>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" placeholder="Address" name="landmark">
						<label for="floatingInput">Landmark (Optional)</label>
					</div>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" placeholder="PIN CODE" name="pincode" required>
						<label for="floatingInput">Pin Code</label>
					</div>
					<div class="form-floating mb-3">
						<input type="number" class="form-control" placeholder="Total Amount" name="amount" disabled>
						<label for="floatingInput">Total Amount</label>
					</div>



					<a class="btn btn-warning mt-3" name="register" type="submit">Payment</a>

				</form>

			</div>
		</div>
	</section>






</body>

</html>