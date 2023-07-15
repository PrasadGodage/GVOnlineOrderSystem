<?php

error_reporting(0);
include('./Admin/config.php');


// $username = $_SESSION['username'];
// $landmark = $_SESSION['landmark'];
$userid = $_SESSION['userid'];
// $address = $_SESSION['address'];
// $pincode = $_SESSION['pincode'];
// $name = $_SESSION['name'];



// if (!isset($_SESSION['username'])) {

// 	header("location:./loginForm.php");
// }


// error_reporting(0);

// session_start();

// include('./Admin/config.php');









?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Food Order System</title>
	<style>
		.food-card {
			margin-bottom: 24px;
		}

		.nav {

			position: fixed;

			bottom: 0;

			width: 100%;

			height: 55px;

			box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);

			background-color: #ffffff;

			display: flex;

			overflow-x: auto;

			z-index: 2;

		}



		.nav__link {

			display: flex;

			flex-direction: column;

			align-items: center;

			justify-content: center;

			flex-grow: 1;

			min-width: 50px;

			overflow: hidden;

			white-space: nowrap;

			font-family: sans-serif;

			font-size: 13px;

			color: #444444;

			text-decoration: none;

			-webkit-tap-highlight-color: transparent;

			transition: background-color 0.1s ease-in-out;

		}



		.nav__link:hover {

			background-color: #eeeeee;

		}



		.nav__link--active {

			color: black;

		}



		.nav__icon {

			font-size: 18px;

		}
	</style>
</head>

<body>

	<?php include('./Admin/config.php');



	$sql = mysqli_query($con, "SELECT * FROM `cart` WHERE `userid` = '$userid'") or die("query failed");

	$row_count = mysqli_num_rows($sql);


	$query = "SELECT * FROM `usermaster` WHERE `userid` = '$userid'";
	$res = mysqli_query($con, $query);
	if ($res) {
		$fetchq = mysqli_fetch_assoc($res);
	}







	?>






	<!-- <nav class="navbar navbar-expand-lg navbar-light"> -->
	<div class="container-fluid  bg-warning">
		<div style="display: flex; align-items:center; justify-content:space-between; padding:3px">
			<div class="d-flex">
				<a href="header.php"><img src="./assets/mainlogo.png" alt="" height="50px" width="200px" style="margin-left: -39px;"></a>
				<img src="assets/2.png" alt="" style="margin-left: -52px;">
				<!-- <p class="mt-3"><span><i class="fa-solid fa-phone"></i></span><a href="tel:9075555565" style="text-decoration: none; color:black"> - 9075555565</a></p> -->
			</div>
			<div class="btn-group">
				<a href="./mycart.php" class="nav__link" style="margin-right: 12px;">
					<i class="material-icons nav__icon">shopping_cart</i>

					<span class="nav__text">Cart <span class="ml-2"><?php echo $row_count; ?></span></span>
				</a>
				<a type="button" class="nav__link" data-bs-toggle="dropdown" aria-expanded="false">
					<img src="<?php echo $fetchq['userImage']; ?>" class="rounded-circle" alt="" width="35px" height="35px">

				</a>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="header.php">Home</a></li>
					<li><a class="dropdown-item" href="orders.php">Orders</a></li>
					<li><a class="dropdown-item" href="profile.php">Profile</a></li>
					<hr>
					<li class="px-3 py-1"><a class="btn btn-danger form-control" href="logout.php">Logout</a></li>
				</ul>

			</div>



		</div>
	</div>
	<!-- </nav> -->


	<!-- <body> -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>