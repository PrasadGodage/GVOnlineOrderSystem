<?php
session_start();
include('config.php');
include('functions.php');
	extract($_POST);
	$loginuserid=$_SESSION['id'];

 
		//fetching New Orders

	if(isset($_POST['orderidjs']))
		{
			$tabledata="
            <table class='table table-striped table-hover'>
            <tr>
                <th>Item Name</th>
                <th>Qty</th>
                <!-- <th>Price</th> -->
                <!-- <th>Total</th> -->
            </tr>
            ";
			$selectmenulist="SELECT * FROM `orderdetails` where `orderid`='$orderidjs'";
          ///  echo $selectmenulist;

			$res=mysqli_query($con,$selectmenulist);

			if(mysqli_num_rows($res)>0)
			{
			$num=1;
            $sumoforder=0;
					while($row=mysqli_fetch_array($res))
				{
					$tabledata.="<tr>
					<td>".getmenunamebyid($con,$row['itemid'])."</td>
					<td>".$row['qty']."</td>
					<!-- <td>".$row['rate']." </td> -->
					<!-- <td>".$row['amount']."</td> -->
                    </tr>
					";
                    $sumoforder=$sumoforder+$row['amount'];
				$num++;
			}
			}else{
				$tabledata.="<tr>
					<td colspan=4 class='text-center'>No Items Found in this Order</td>
			</tr>";
			}



            $tabledata.="<tr>
            <td align=right><h5><b>Total</b></h5></td>
            <td><h5><b>$sumoforder</b></h5></td>
            </tr>";
            $tabledata.="</table>";

			echo $tabledata;
		}


	

?>