if (isset($_POST['payment'])) {

	
$ordername = $_POST['ordername'];
$orderusername = $_POST['ordermob'];
$orderaddress = $_POST['orderaddress'];
$orderlandmark = $_POST['orderlandmark'];
$orderpincode = $_POST['orderpincode'];
$orderlatitude = $_POST['latitude'];
$orderlongitude = $_POST['longitude'];
$orderamt = $_POST['orderamt'];
$currentDate = date('Y-m-d');
$current_time = date("H:i:s");
$orderstatus = "Open";



$s = "INSERT INTO `ordermaster`(`orderdate`, `ordertime` , `userid`, `address`, `landmark`, `pincode`, `orderstatus`, `orderbillamount`) VALUES ('$currentDate', '$current_time','$userid','$orderaddress','$orderlandmark','$orderpincode' , '$orderstatus', '$orderamt')";



$q = mysqli_query($con, $s);

if ($q) {

	$last_id = mysqli_insert_id($con);


	$selectData = "SELECT `orderdate`,`ordertime`,`userid`,`itemid`,`itemname`,`qun`,`rate`,`itemimage` FROM `cart` WHERE `userid` = '$userid'";
	$sel = mysqli_query($con, $selectData);

	while ($fetch = mysqli_fetch_array($sel)) {
		$itemid = $fetch['itemid'];
		$qty = $fetch['qun'];
		$rate = $fetch['rate'];
		$amount = $fetch['rate'] * $fetch['qun'];
		$insertOrder = "INSERT INTO `orderdetails`(`orderid`, `itemid`, `userid`, `qty`, `rate`, `amount`) VALUES ('$last_id','$itemid', '$userid','$qty','$rate','$amount')";
		$res = mysqli_query($con, $insertOrder);
	}








	if ($res) {


		$userid = $_SESSION['userid'];
		$deleteCartData = "DELETE FROM `cart` WHERE `userid` = '$userid'";



		if (mysqli_query($con, $deleteCartData)) {
			echo "<script>
			
			window.location.href='./orders.php';
			</script>";
		} else {
			echo "<script>
			alert('Error Order');
			window.location.href='./checkout.php';
			</script>";
		}
	}
}
}