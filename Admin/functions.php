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


?>


