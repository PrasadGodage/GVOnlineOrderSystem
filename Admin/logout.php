<?php
session_start();

// unset($_SESSION['email']);
//unset($_SESSION['name']);


session_destroy();
//header('location:index.php');
echo "<script>";
//echo "alert('Logout Successfull');";
echo 'window.location.href="index.php";';
echo "</script>";
?>