<?php


include("./Admin/config.php");



// UPDATE PROFILE CODE

if (isset($_POST['update'])) {
	$upName = $_POST['upName'];
	
	$upAddress = $_POST['upAddress'];
	$upLandmark = $_POST['upLandmark'];
	$upPincode = $_POST['upPincode'];
	$userid = $_POST['userid'];

	$filename = $_FILES["upImage"]["name"];
	$temp = $_FILES["upImage"]["tmp_name"];
	$folder = "userImage/" . $filename;
	move_uploaded_file($temp, 'userImage/' . $filename);


	$updatequery = "UPDATE `usermaster` SET `name`= '$upName' , `landmark`='$upLandmark',`pincode`= '$upPincode', `address` = '$upAddress' , `userImage` = '$folder'   WHERE `userid` = '$userid'";
	$resultUpdate = mysqli_query($con, $updatequery);

	if ($resultUpdate) {
		echo "<script>

		alert('Profile Updated');

		window.location.href='./profile.php';

		</script>";
	} else {

		echo "<script>

		alert('Error');

		window.location.href='./profile.php';

		</script>";
	}
}


//CHANGE PASSWORD CODE


if (isset($_POST['change'])) {


	$oldPass = $_POST['oldPass'];
	$upPass = $_POST['newPass'];
	$userid = $_POST['userid'];


	$checkold = "SELECT * FROM `usermaster` WHERE `password` = '$oldPass'";
	$resOld = mysqli_query($con, $checkold);

	if (mysqli_num_rows($resOld) > 0) {
		$updatePass = "UPDATE `usermaster` SET `password`='$upPass' WHERE `userid` = '$userid'";

		if (mysqli_query($con, $updatePass)) {
			echo "<script>
			alert('Password Updated');
			window.location.href='./profile.php';
			</script>";
		}
	} else {
		echo "<script>

		alert('Password not match');

		window.location.href='./profile.php';

		</script>";
	}
}
