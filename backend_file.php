<?php

session_start();



include("./Admin/config.php");









if (isset($_POST['register'])) {



	$name = $_POST['name'];

	$landmark = 'demolandmark';

	$mob = $_POST['mob'];

	$email = $_POST['email'];

	$address = $_POST['address'];

	$pincode = $_POST['pincode'];

	$password = $_POST['password'];



	$currentDate = date('Y-m-d');

	if (preg_match('/^[0-9]{10}+$/', $mob)) {


		$checkMobile = "SELECT * FROM `usermaster` WHERE `contact` = '$mob' OR `email` = '$email'";
		$res = mysqli_query($con, $checkMobile);
	} else {
		echo "<script>

				alert(' Inavlid mobile number');

				window.location.href='./registrationForm.php';

				</script>";
	}


	if (mysqli_num_rows($res) > 0) {

		echo "<script>

				alert('You are already register');

				window.location.href='./registrationForm.php';

				</script>";
	} else {

		$sql = "INSERT INTO `usermaster`( `usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `registrationdate`) VALUES ('customer','$name','$mob','$email','$password','$mob','$landmark','$pincode','$address','$currentDate')";
		// echo $sql;
		$res1 = mysqli_query($con, $sql);

		if ($res1) {

			echo "<script>

				alert('Registeration Successful');

				window.location.href='./loginForm.php';

				</script>";
		} else {

			echo "<script>

				alert('Something went wrong');

				 window.location.href='./registrationForm.php';

				</script>";
		}
	}
}



if (isset($_POST['login'])) {
	$mob = $_POST['number'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM `usermaster` WHERE `contact` = '$mob'";
	// AND `password` = '$password'
	$result = mysqli_query($con, $sql);

	$sql1 = "SELECT * FROM `deliveryboymaster` WHERE `deliveryboy_mob` = '$mob' AND `deliveryboy_password` = '$password'";
	$result1 = mysqli_query($con, $sql1);



	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$rows = mysqli_fetch_assoc($result);
			$_SESSION['username'] = $rows['username'];
			$_SESSION['email'] = $rows['email'];
			$_SESSION['userid'] = $rows['userid'];
			$_SESSION['landmark'] = $rows['landmark'];
			$_SESSION['address'] = $rows['address'];
			$_SESSION['pincode'] = $rows['pincode'];
			$_SESSION['name'] = $rows['name'];
			echo "<script>
				window.location.href='./header.php';
				</script>";
		} else {
			mysqli_num_rows($result1) > 0;
			$rows1 = mysqli_fetch_assoc($result1);
			$_SESSION['id'] = $rows1['id'];
			$_SESSION['deliveryboy_name'] = $rows1['deliveryboy_name'];
			$_SESSION['del_mob'] = $rows1['del_mob'];

			echo "<script>
			window.location.href='./Delivey/index.php';
			</script>";
		}
	}
} else {


	echo "<script>
	
			alert('Credential Error');
	
			window.location.href='./loginForm.php';
	
			</script>";
}



if (isset($_GET['status'])) {

	$set = $_GET['status'];
	$orderid = $_GET['orderid'];

	$sql = "UPDATE `ordermaster` SET `orderstatus`= '$set' WHERE `orderid` = '$orderid'";

	$resy = mysqli_query($con, $sql);

	if ($resy) {
		echo "<script>

		alert('Order Cancelled');

		window.location.href='./orders.php';

		</script>";
	}
}



if (isset($_GET['iditem'])) {
	$iditem = $_GET['iditem'];

	$delcart = "DELETE FROM `cart` WHERE `itemid` = '$iditem'";
	$delres = mysqli_query($con, $delcart);

	if ($delcart) {

		echo "<script>

			window.location.href='./mycart.php';
	
			</script>";
	} else {
		echo "<script>
	
			alert('Cart Error');
	
			window.location.href='./mycart.php';
	
			</script>";
	}
}


// Update Profile 
