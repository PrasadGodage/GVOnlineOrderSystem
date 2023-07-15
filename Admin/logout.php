<?php
session_start();


include('functions.php');
include('config.php');
// unset($_SESSION['email']);
//unset($_SESSION['name']);
setresorentDeactive($con);

session_destroy();
//header('location:index.php');
echo "<script>";
//echo "alert('Logout Successfull');";
echo 'window.location.href="index.php";';
echo "</script>";
?>