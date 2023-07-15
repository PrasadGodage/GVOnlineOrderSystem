<?php

session_start();
include('../Admin/config.php');
$phone = $_SESSION['phone'];
$uid = $_SESSION['uid'];
$temp = $_SESSION['temp'];





// session variables

$userid = $_SESSION['userid'];
$username = $_SESSION['name'];
$usermob = $_SESSION['username'];
$useradd = $_SESSION['address'];
$userlandmark = $_SESSION['landmark'];
$userpincode = $_SESSION['pincode'];
$orderamount = $_SESSION['toValue'];

// $r = $_GET['response'];
$r = 1;
if ($r == 1) {
   


    $currentDate = date('Y-m-d');
    $current_time = date("H:i:s");
    $orderstatus = "Open";



    $s = "INSERT INTO `ordermaster`(`orderdate`, `ordertime` , `userid`, `address`, `landmark`, `pincode`, `orderstatus`, `orderbillamount`) VALUES ('$currentDate', '$current_time','$userid','$useradd','$userlandmark','$userpincode' , '$orderstatus', '$orderamount')";



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
								
								window.location.href='../orders.php';
								</script>";
            } else {
                echo "<script>
								alert('Error Order');
								window.location.href='../checkout.php';
								</script>";
            }
        }
    }
}

else if ($r == 0) {
    echo "<script>
    alert('Payment Error');
    window.location.href='../checkout.php';
    </script>";

}