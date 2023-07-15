<?php

session_start();




include('./Admin/config.php');


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



<?php include('./nav1.php'); ?>

<body>
	<div class="container mb-4">
		<h1 class="my-4 text-center text-warning">Shopping Cart</h1>
		<div class="row">

			<?php
			include('./Admin/config.php');

			$sql = "SELECT * FROM `cart` WHERE `userid` = '$userid'";
			$result = mysqli_query($con, $sql);


			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) { ?>

					<div class="col-md-8 mb-3">

						<div class="card">


							<div style="display: flex; align-items:center; justify-content:end">
								<div class="card-body">
									<img src="./Admin/<?php echo $row['itemimage']; ?>" height="80px" width="80px">
								</div>
								<div class="card-body">
									<p class="card-title text-bold"><?php echo $row['itemname']; ?></p>
									<p class="card-text">Quantity: <?php echo $row['qun']; ?></p>
								</div>
								<div class="card-body">

									<p class="card-text">Rs.<?php echo $row['rate']; ?></p>
								</div>
								<div class="card-body">
									<?php

									$iditem = $row['itemid'];

									?>
									<a href="backend_file.php?iditem=<?php echo $iditem; ?>"><img src="assets/del.png" alt="" height="25px" width="25px"></a>

								</div>



							</div>
						</div>
					</div>

			<?php
				}
			}

			?>


			<div class="col-md-4 mb-5">
				<div class="card">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center">
							<?php

							$sql = "SELECT `userid` , SUM(qun * rate) AS tot FROM `cart` WHERE `userid` = '$userid' GROUP BY `userid` ";

							$result = mysqli_query($con, $sql);
							if (mysqli_num_rows($result) > 0) {

								$row = mysqli_fetch_assoc($result);
							}


							?>
							<h5 class="card-title">Total Amount</h5>
							<p class="text-right mt-3">Rs.<strong><?php echo $row['tot']; ?></strong></p>

						</div>




						<a href="checkout.php?amt=<?php echo $row['tot']; ?>" class="btn btn-success form-control">Procced to Address</a>
					</div>
				</div>
			</div>
		</div>
	</div>





	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>



</body>

</html>