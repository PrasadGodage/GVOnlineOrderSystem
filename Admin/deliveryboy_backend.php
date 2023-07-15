<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

    //insert new Menu
    if(isset($_POST['boyname']) && isset($_POST['boymob']) )
{

    $inseruser="INSERT INTO `deliveryboymaster`(`deliveryboy_name`, `deliveryboy_mob`,`deliveryboy_password`) VALUES ('$boyname','$boymob','Boy@2023')";


            //echo $ledgerquery;
            if(mysqli_query($con,$inseruser))
            {			
            $output="Done";

            }
            echo $output;
    // }

}

//update party data
    if(isset($_POST['hidden_id']) && isset($_POST['upboyname']) && isset($_POST['upboymob']) )
{
   $updatelegerrecord="UPDATE `deliveryboymaster` SET `deliveryboy_name`='$upboyname',`deliveryboy_mob`='$upboymob' WHERE `id`='$hidden_id'";
			//echo $updatelegerrecord;
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
		  $sql="DELETE FROM `deliveryboymaster` WHERE id='$deleteid'";
		  //echo($sql);
		  mysqli_query($con,$sql);

		}





if (isset($_POST['updateid']))
	{


		$boyid=$_POST['updateid'];
		$selectquery="SELECT * FROM `deliveryboymaster` where `id`='$boyid'";

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