<?php

require('config.php');

session_start();



// session variables

$userid = $_SESSION['userid'];
$username = $_SESSION['name'];
$usermob = $_SESSION['username'];
$useradd = $_SESSION['address'];
$userlandmark = $_SESSION['landmark'];
$userpincode = $_SESSION['pincode'];
$orderamount = $_SESSION['toValue'];

echo $userid;
echo $username;
echo $usermob;
echo $useradd;
echo $userlandmark;
echo $userpincode;
echo $orderamount;
echo $orderamount;

require_once 'common.php';
$applicatF = new STUDENT();
require('Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";



if (empty($_POST['razorpay_payment_id']) === false) {
	$api = new Api($keyId, $keySecret);

	try {
		$attributes = array(
			'razorpay_order_id' => $_SESSION['razorpay_order_id'],
			'razorpay_payment_id' => $_POST['razorpay_payment_id'],
			'razorpay_signature' => $_POST['razorpay_signature']
		);

		$api->utility->verifyPaymentSignature($attributes);
	} catch (SignatureVerificationError $e) {
		$success = false;
		$error = 'Razorpay Error : ' . $e->getMessage();
	}
}

if ($success === true) {

	$razorpayOrderId = $_SESSION['razorpay_order_id'];
	$razorpayPaymentId = $_POST['razorpay_payment_id'];
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$phone = $_SESSION['phone'];
	$service = $_SESSION['service'];
	$typeProduct = $_SESSION['typeProduct'];
	$toValue = $_SESSION['toValue'];
	$message = $_SESSION['message'];
	$paymentStatus = 'SUCCESS';
	$updatestamp = date('Y-m-d h:i:s');
	$stmt = $applicatF->runQuery("SELECT * FROM onlinepayment WHERE email=:email1 and razorpayOrderId='$razorpayOrderId' and razorpayPaymentId <>'' ");
	$stmt->execute(array(":email1" => $email));
	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($stmt->rowCount() > 0) {
		$errMSG = "You have already submited.";
	} else {

		if ($applicatF->updatePayStatus($email, $razorpayOrderId, $razorpayPaymentId, $paymentStatus, $updatestamp)) {

			$successMSG = "Your payment has been completed successfuly..";
		} else {
			$errMSG = "sorry , Query could no execute...";
		}

		//$html = "{$_POST['razorpay_payment_id']}";
	}
} else {
	$paymentStatus = 'FAILURE';
	$updatestamp = date('Y-m-d h:i:s');
	$applicatF->updatePayStatus($email, $razorpayOrderId, $razorpayPaymentId, $paymentStatus, $updatestamp);
}

?>

<?php
if (isset($errMSG)) {
	echo "<script>
				window.location.href='suc.php?response=0';
				</script>";
} else if (isset($successMSG)) {


	echo "<script>
				window.location.href='suc.php?response=1';
				</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Razorpay | Payment Gateway Integration</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<?php
			if (isset($errMSG)) {
				echo "<script>
				window.location.href='suc.php?response=0';
				</script>";
			} else if (isset($successMSG)) {


				echo "<script>
				window.location.href='suc.php?response=1';
				</script>";
			}
			?>


			<table>
				<tr>
					<td class="txt-agl-rt">Your Name</td>
					<td class="txt-agl-lt"><?php echo $name; ?></td>
				</tr>
				<tr>
					<td class="txt-agl-rt">Your Email</td>
					<td class="txt-agl-lt"><?php echo $email; ?></td>
				</tr>
				<tr>
					<td class="txt-agl-rt">Order ID</td>
					<td class="txt-agl-lt"><?php echo $razorpayOrderId; ?></td>
				</tr>
				<tr>
					<td class="txt-agl-rt">Payment ID</td>
					<td class="txt-agl-lt"><?php echo $razorpayPaymentId; ?></td>
				</tr>
				<tr>
					<td class="txt-agl-rt">Mobile Number</td>
					<td class="txt-agl-lt"><?php echo $phone; ?></td>
				</tr>
				<tr>
					<td class="txt-agl-rt">Selected Service</td>
					<td class="txt-agl-lt"><?php echo $service; ?></td>
				</tr>
				<tr>
					<td class="txt-agl-rt">Product Type</td>
					<td class="txt-agl-lt"><?php echo $typeProduct; ?></td>
				</tr>
				<tr>
					<td class="txt-agl-rt">Amount</td>
					<td class="txt-agl-lt"><?php echo $toValue; ?></td>
				</tr>
			</table>
		</div>
	</div>

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function() {
				$(this).on('select2:close', function(e) {
					if ($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					} else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
		var filterBar = document.getElementById('filter-bar');

		noUiSlider.create(filterBar, {
			start: [10, 2000],
			connect: true,
			range: {
				'min': 10,
				'max': 2000
			}
		});

		var skipValues = [
			document.getElementById('value-lower'),
			document.getElementById('value-upper')
		];

		filterBar.noUiSlider.on('update', function(values, handle) {
			skipValues[handle].innerHTML = Math.round(values[handle]);
			$('.contact100-form-range-value input[name="fromValue"]').val($('#value-lower').html());
			$('.contact100-form-range-value input[name="toValue"]').val($('#value-upper').html());
		});
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>