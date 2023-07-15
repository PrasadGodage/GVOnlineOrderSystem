<?php
include('config.php');




function getusernamebyid($con,$id)
{
    $selectquery = "SELECT * FROM `usermaster` where `userid`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $legerid=$row['name'];

   echo $legerid;
}
function getusernamebyiddash($con,$id)
{
    $selectquery = "SELECT * FROM `usermaster` where `userid`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $legerid=$row['name'];

   return $legerid;
}
function getdeliveryboynamebyid($con,$id)
{
    $selectquery = "SELECT * FROM `deliveryboymaster` where `id`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $boyname=$row['deliveryboy_name'];

   echo $boyname;
}
function getdeliveryboymobbyid($con,$id)
{
    $selectquery = "SELECT * FROM `deliveryboymaster` where `id`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $boyname=$row['deliveryboy_mob'];

   echo $boyname;
}
function getmenunamebyid($con,$id)
{
    $selectquery = "SELECT * FROM `itemmaster` where `itemid`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $menuname=$row['itemname'];

   return $menuname;
}
function ffff($con,$id)
{
    $selectquery = "SELECT * FROM `deliveryboymaster` where `id`='$id'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
   $row = mysqli_fetch_assoc($result);
   $boyname=$row['deliveryboy_name'];

   echo $boyname;
}
function setresorentActive($con)
{
    // echo "<script>";
    // echo "alert('I m From Set Active Function');";
    // echo "</script>";
    $selectquery = "UPDATE `firmmaster` SET `restaurantstatus`='1' WHERE `firmid`='1'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $boyname=$row['deliveryboy_name'];

//    echo $boyname;
}
function setresorentDeactive($con)
{
    $selectquery = "UPDATE `firmmaster` SET `restaurantstatus`='0' WHERE `firmid`='1'";
    //  echo $selectquery;
   $result = mysqli_query($con, $selectquery);
//    $row = mysqli_fetch_assoc($result);
//    $boyname=$row['deliveryboy_name'];

//    echo $boyname;
}



?>


