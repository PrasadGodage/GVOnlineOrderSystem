<?php
// include('config.php');


// insertlog($con,"Rahul","Created new party name : Moj engg");

// getusernamebyvchid($con,"80");


function insertlog($con,$user,$disc)
{
    $today=date("Y-m-d");
    date_default_timezone_set("Asia/Calcutta");
    $currenttime=date("h:i:sa");
    $insertsql="INSERT INTO `logtable`(`user`, `disc`, `date`, `time`) 
    VALUES ('$user','$disc','$today','$currenttime')";

    mysqli_query($con, $insertsql);

}


// function getusernamebyvchid($con,$vchid)
// {
//     $selectquery = "SELECT * FROM `vouchersdtls` where `vouchersid`='$vchid' AND `DRCRtype`='DR'";
//     //  echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $legerid=$row['ledgerid'];

//    echo getPartyNameByLegerid($con,$legerid);
// }



// function getPartyNameByLegerid($con,$legerid)
// {
//     $selectquery = "SELECT * FROM `ledgermaster` where `ledgerid`='$legerid'";
//     //   echo $selectquery;
//    $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $ledgername=$row['ledgername'];
//    return $ledgername;
// }
?>


