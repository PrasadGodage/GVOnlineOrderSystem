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

echo $username;
echo $landmark;
echo $userid;
echo $address;
echo $pincode;
echo $name;

if (!isset($_SESSION['username'])) {

	header("location:./loginForm.php");
}

if (isset($_POST['payment'])) {
	$ordername = $_POST['ordername'];
	$orderusername = $_POST['ordermob'];
	$orderaddress = $_POST['orderaddress'];
	$orderlandmark = $_POST['orderlandmark'];
	$orderpincode = $_POST['orderpincode'];
	$orderamt = $_POST['orderamt'];
	$currentDate = date('Y-m-d');
	$orderstatus = "Open";


	$s = "INSERT INTO `ordermaster`(`orderdate`, `userid`, `address`, `landmark`, `pincode`, `orderstatus`, `orderbillamount` ) VALUES ('$currentDate','$userid','$orderaddress','$orderlandmark','$orderpincode','$orderstatus','$orderamt')";

	$q = mysqli_query($con, $s);

	if ($q) {




		$selectData = "SELECT `orderid` , `rate`, `qun`, `itemid`
				FROM `cart` 
				INNER JOIN ordermaster ON ordermaster.userid=cart.userid  
				WHERE cart.userid='$userid' AND ordermaster.orderstatus = 0";
		$selectquery = mysqli_query($con, $selectData);

		if ($selectquery) {
			while ($fetch = mysqli_fetch_assoc($selectquery)) {
				$orderid = $fetch['orderid'];
				$itemid = $fetch['itemid'];
				$qty = $fetch['qun'];
				$rate = $fetch['rate'];
				$amount = $fetch['rate'] * $fetch['qun'];

				$insertq = "INSERT INTO `orderdetails`(`orderid`, `itemid`, `userid`, `qty`, `rate`, `amount`) VALUES ('$orderid','$itemid', '$userid','$qty','$rate','$amount')";


				$res = mysqli_query($con, $insertq);
			}

			if ($res) {


				$userid = $_SESSION['userid'];
				$deleteCartData = "DELETE FROM `cart` WHERE `userid` = '$userid'";


				if (mysqli_query($con, $deleteCartData)) {
					echo "<script>
					alert('Order Successful');
					window.location.href='./orders.php';
					</script>";
				}
			}
		}
	}
}



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
<?php include('navabar.php'); ?>

<body>
	<section class="wrapper">
		<div class="container" style="margin-bottom: 70px;">
			<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center mt-5">


				<form action="" class="rounded bg-white shadow p-5" method="POST">
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
						<span class="input-group-text"><a href="https://www.google.com/maps"><i class="material-icons nav__icon">add_location_alt</i></a></span>
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



					<input class="btn btn-success mt-3" name="payment" type="submit">

				</form>

			</div>
		</div>
	</section>






</body>

</html>