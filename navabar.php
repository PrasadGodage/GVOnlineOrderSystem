




<!DOCTYPE html>

<html lang="en">



<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Document</title>

	<style>
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

	

	<div class="container-fluid" style="margin-left: -12px;">

		<!-- navbar  -->

		<nav class="nav bg-warning">

			<a href="header.php" class="nav__link">

				<i class="material-icons nav__icon">home</i>

				<span class="nav__text">Home</span>

			</a>

			<a href="./orders.php" class="nav__link nav__link--active">

				<i class="material-icons nav__icon">shopping_bag</i>

				<span class="nav__text">Orders</span>

			</a>

			<a href="./mycart.php" class="nav__link">

				<i class="material-icons nav__icon">shopping_cart</i>

				<span class="nav__text">Cart <span class="ml-2"><?php echo $row_count; ?></span></span>



			</a>

			<a href="profile.php" class="nav__link">

				<i class="material-icons nav__icon">person</i>

				<span class="nav__text">Profile</span>

			</a>



		</nav>

	</div>

</body>



</html>