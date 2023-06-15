<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['orderid']) && isset($_POST['status']))
{
	

    $updateorderstatusquery="UPDATE `ordermaster` SET `orderstatus`='$status' WHERE `orderid`='$orderid'";


            //echo $ledgerquery;
            if(mysqli_query($con,$updateorderstatusquery))
            {			
            $output="Done";
            }
            echo $output;
    // }

}

//update party data
    if(isset($_POST['hidden_id']) && isset($_POST['upmenuname']) && isset($_POST['upmenuunit'])&& isset($_POST['upmenurate'])&& isset($_POST['upbehavior'])&& isset($_POST['upmenucategory'])&& isset($_POST['upmakingtime'])&& isset($_POST['updisc']))
{
   $updatelegerrecord="UPDATE `itemmaster` SET `itemname`='$upmenuname',`itemdisc`='$updisc',`unit`='$upmenuunit',`rate`='$upmenurate',`itemcategoryname`='$upmenucategory',`itembehavior`='$upbehavior',`makingtime`='$upmakingtime' WHERE `itemid`='$hidden_id'";
			///echo $insertsql;
				if(mysqli_query($con,$updatelegerrecord))
				{
					$output="updated";
				
				}
                echo $output;
}




		///delete data
		if(isset($_POST['deleteid']))
		{
				$deleteid=$_POST['deleteid'];
		  $sql="DELETE FROM `itemmaster` WHERE itemid='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}





if (isset($_POST['updateid']))
	{


		$itemid=$_POST['updateid'];
		$selectquery="SELECT * FROM `itemmaster` where `itemid`='$itemid'";

		$result=mysqli_query($con, $selectquery);

		$responce=array();

		if(mysqli_num_rows($result)>0)
		{

			while ($row=mysqli_fetch_assoc($result))
			{
				$responce =$row;
			}
		}else
		{
					$responce['status']=200;
					$responce['message']="No Record Found";

		}
			echo json_encode($responce);
		}else
		{
			            $responce['status']=200;
						$responce['message']="Invalid Request";
		}


		if (isset($_POST['fpartyid']))
		{
			$sql="SELECT * FROM `partydata` WHERE id='$fpartyid'";
			// echo $sql;
			$result=mysqli_query($con, $sql);
			$address="ee";
			if($row = mysqli_fetch_assoc($result))
			{
				$address=$row['address'];
			}
			echo $address;
		}

		if (isset($_POST['partylegderid']))
		{
			$sql="SELECT * FROM `ledgermaster` WHERE `ledgerid`='$partylegderid'";
			//  echo $sql;
			$result=mysqli_query($con, $sql);
			 $openingbalance=00;
			if($row = mysqli_fetch_assoc($result))
			{
				$openingbalance=$row['openingbalance'];
			}
			echo $openingbalance;
		}

?>