<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



function sendmail($tomailid, $subject, $msg)
{
	$frommailid = "rajeshai@order.gvsoft.in";
	// $frommailid="madhavcovidapp@gmail.com";
	$password = "@PS-sab48lp)";

	$mail = new PHPMailer(true);
	$mail->SMTPDebug = 3;


	$mail->isSMTP();
	$mail->Host = 'order.gvsoft.in';
	// $mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = $frommailid; //Your Mail
	$mail->Password = $password; //Your Gmail APP Code

	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom($frommailid); //Your Mail


	$mail->addAddress($tomailid);

	$mail->isHTML(true);

	$mail->Subject = $subject;
	$mail->Body = $msg;

	$mail->send();

}
