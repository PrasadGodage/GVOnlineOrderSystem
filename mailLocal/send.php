<?php
include("../Admin/config.php");
include("./backend.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



function sendmail($tomailid, $subject, $msg)
{
	$frommailid = "rajeshai@order.gvsoft.in";
	// $frommailid="madhavcovidapp@gmail.com";
	$password = "lWflC?W4v7MD";

	$mail = new PHPMailer(true);
	$mail->SMTPDebug = 3;


	$mail->isSMTP();
	// $mail->Host = 'order.gvsoft.in';
	$mail->Host = 'localhost';
	// $mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = false;
	$mail->Username = $frommailid; //Your Mail
	$mail->Password = $password; //Your Gmail APP Code

	$mail->SMTPSecure = 'none';
	$mail->Port = 25;
	$mail->setFrom($frommailid); //Your Mail


	$mail->addAddress($tomailid);

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = $msg;

	$mail->send();
}


// $email = $_GET['email'];
$email = "soulsoft.soul119@gmail.com";

$search = "SELECT * FROM `usermaster` WHERE `email` = '$email'";
echo $email;
echo $search;

$result = mysqli_query($con, $search);

if (mysqli_num_rows($result) > 0) {
	echo "test";

	$fetch = mysqli_fetch_assoc($result);

	$msg = $fetch['password'];

	$subject = "Your last password";

	$tomailid = $fetch['email'];

	sendmail($tomailid, $subject, $msg);
	echo "Good";
} else {
	echo "
	<script>
	alert('Your credentials does not match');
	alert('Please retype your credentials');
	document.location.href = '../index.php';
	</script>
	";
}
