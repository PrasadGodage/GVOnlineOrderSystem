<?php
session_start();

include("./Admin/config.php");



if (isset($_POST['register'])) {

	$name = $_POST['name'];
	$cusType = $_POST['cusType'];

	$landmark = $_POST['landmark'];
	$mob = $_POST['mob'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$pincode = $_POST['pincode'];
	$password = $_POST['password'];
	$encypass = md5($password);
	$currentDate = date('Y-m-d');


	$sql = "INSERT INTO `usermaster`( `usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `registrationdate`) VALUES ('$cusType','$name','$mob','$email','$encypass','$mob','$landmark','$pincode','$address','$currentDate')";
	// $sql = "INSERT INTO `usermaster`(`usertype`, `name`, `contact`, `email`, `password`, `username`, `landmark`, `pincode`, `address`, `address`) VALUES ('customer','$name','$mob','$email','$encypass','$username','$landmark','$pincode','$address')";

	if (mysqli_query($con, $sql)) {
		echo "<script>
				alert('Registration successful');
				window.location.href='./loginForm.php';
				</script>";
	} else {
		echo "<script>
				alert('Error registration');
				window.location.href='./registrationForm.php';
				</script>";
	}
}

if (isset($_POST['login'])) {
	$mob = $_POST['number'];
	$password = $_POST['password'];
	$encypass = md5($password);


	$sql = "SELECT * FROM `usermaster` WHERE `contact` = '$mob' AND `password` = '$encypass'";
	$result = mysqli_query($con, $sql);

	if ($result) {

		if (mysqli_num_rows($result) > 0) {

			$rows = mysqli_fetch_array($result);

			$_SESSION['username'] = $rows['username'];
			$_SESSION['userid'] = $rows['userid'];
			$_SESSION['landmark'] = $rows['landmark'];
			$_SESSION['address'] = $rows['address'];
			$_SESSION['pincode'] = $rows['pincode'];
			$_SESSION['name'] = $rows['name'];




			echo "<script>
				alert('Login Successful');
				window.location.href='./header.php';
				</script>";
		}
	} else {
		echo "<script>
		alert('Credential Error');
		window.location.href='./loginForm.php';
		</script>";
	}
}
