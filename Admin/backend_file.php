<?php include("config.php");


$up = $_GET['disable'];
$updateRes = "UPDATE `firmmaster` SET `restaurantstatus`= '$up' WHERE 1";


if (mysqli_query($con, $updateRes)) {
	header('Location:managecomapany.php');
} else {
	echo "error";
}

?>
