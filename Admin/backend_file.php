<?php include("./config.php"); ?>

<?php
if (isset($_POST['register'])) {

	$name = $_POST['name'];
	$mob = $_POST['mob'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$pincode = $_POST['pincode'];
	$password = $_POST['password'];

	$encypass = md5($password);

	$sql = "INSERT INTO `user_details`(`user_name`, `user_number`, `user_email`, `user_address`, `user_pincode`, `user_password`) VALUES ('$name','$mob','$email','$address','$pincode','$encypass')";
	
	if (mysqli_query($con, $sql)) {
		echo "Success";
	} else {
		echo "Error";
	}

}

if (isset($_POST['login'])) {
	$mob = $_POST['number'];
	$password = $_POST['password'];


	$sql = "SELECT `user_number`, `user_password` FROM `user_details` WHERE `user_number` = '$mob' AND `user_password` = '$password'";

	if (mysqli_query($con, $sql)) {
		echo "User Login";
	} else {
		echo "Error";
	}
}
