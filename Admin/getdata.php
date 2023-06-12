<?php 
include('config.php');
// echo "get data called";
if(isset($_POST["datee"]) )
{
$inpdate=$_POST['datee'];
echo $inpdate;
	//$query="SELECT * FROM `tbl_attendance`";
	 $query="SELECT * FROM `tbl_attendance` where attdate='$inpdate'";
// echo $query;
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0)
{
		while($row=mysqli_fetch_array($result))
		{?>

			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo getempname($connect,$row[1]) ?>
					<input type="hidden" name="dateholder" value="<?php echo $inpdate; ?>">
				</td>
				<td align="center">
                        <input type="radio" name="attend[<?php echo $row['empID']; ?>]" value="present" <?php if($row['att_status'] == "present") {echo "checked";} ?>> Present
             
                        </td>
                        <td align="center">
                            <input type="radio" name="attend[<?php echo $row['empID']; ?>]" value="absent" <?php if($row['att_status'] == "absent") {echo "checked";} ?>> Absent
                        </td>
			</tr>

		<?php
	}
}
}



if(isset($_POST["month"]) )
{
  // echo "moth inside";

$inpdate=$_POST['month'];

$fromdate=$inpdate.'-01';
$todate=$inpdate.'-31';
echo $fromdate;
echo $todate;

// echo $inpdate;
  //$query="SELECT * FROM `tbl_attendance`";
   $query="SELECT DISTINCT  `empID` FROM `tbl_attendance` where `attdate` between '$fromdate' and '$todate'";
 echo $query;
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0)
{
  $count=1;
    while($row=mysqli_fetch_array($result))
    {?>

      <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo getempname($connect,$row[0]) ?>
          <input type="hidden" name="dateholder" value="<?php echo $inpdate; ?>">
        </td>
        <td align="center">
                   <?php echo getpresent($connect,$row[0],$fromdate,$todate); ?>          
        </td>
        <td align="center">
                  <?php echo getabsent($connect,$row[0],$fromdate,$todate); ?>
        </td>
      </tr>

    <?php
    $count++;
  }
}
}






if(isset($_POST["paymentmonth"]) )
{
  // echo "moth inside";

$inpdate=$_POST['paymentmonth'];
// $_SESSION["paydate"] = $_POST['paymentmonth'];
$fromdate=$inpdate.'-01';
$todate=$inpdate.'-31';
// echo $fromdate;
// echo $todate;

// echo $inpdate;
  //$query="SELECT * FROM `tbl_attendance`";
   $query="SELECT DISTINCT  `empID` FROM `tbl_attendance` where `attdate` between '$fromdate' and '$todate'";
 //echo $query;
$result=mysqli_query($connect,$query);

if(mysqli_num_rows($result)>0)
{
  $count=1;
    while($row=mysqli_fetch_array($result))
    {?>
<form method="POST" action="updatepayment.php">
      <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo getempname($connect,$row[0]); ?>
          <input type="hidden" name="dateholder" value="<?php echo getempname($connect,$row[0]); ?>">
        </td>
        <td align="center">
                   <?php echo getpresent($connect,$row[0],$fromdate,$todate); ?>          
        </td>
        <td align="center">
                  <?php echo getabsent($connect,$row[0],$fromdate,$todate); ?>
        </td>
        <td>
          <?php

          $strperday=str_replace(',', '', getempperday($connect,$row[0]));
          $perday=(int)$strperday;

          $presentday=(int)getpresent($connect,$row[0],$fromdate,$todate); 
           echo $perday*$presentday;
           $allvalue=$row[0]."_".getempname($connect,$row[0])."_".$presentday."_".$perday."_".$perday*$presentday."_".$todate;
           ?>
        </td>
        <?php 

          if(checkstatus($connect,$row[0],$todate)==false)
          {
            echo "<td>
            <center>  
              <div class='badge badge-warning'>Pending</div>
            </center>
          </td>";

          }else
          {
           echo "<td>
            <center>  
              <div class='badge badge-success'>Completed</div>
            </center>
          </td>";
          }

         ?>
          
                      <td><center> <div class="card-header-action">
                    <div class="dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                      <div class="dropdown-menu">
                        <a href="#" class="dropdown-item has-icon edit_student"data-toggle="modal" data-target="#exampleModal16"><i class="far fa-eye"></i>View</a>
                        <div class="dropdown-divider"></div>
                        <a href="updatepayment.php?id=<?php echo $allvalue;?>" class="dropdown-item has-icon edit_student"><i class="far fa-edit" ></i> Edit</a>
                      
                      </div>
                    </div></center></td>
      </tr>
</form>
    <?php
    $count++;
  }
}
}



  function getempname($con,$id)
          {
              $sql = "SELECT `fld_employee_name` FROM tbl_employee WHERE fld_employee_id='$id'";
           //   echo $sql;
              $result = mysqli_query($con, $sql);
              $empname="";
              if (mysqli_num_rows($result) > 0) 
              {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) 
                {
                  $empname=$row['fld_employee_name'];
                }
      return $empname;
          }

}

  function checkstatus($con,$id,$lastdate)
          {
             $sql = "SELECT `empid` FROM tbl_payment WHERE empid='$id' and paydate='$lastdate'";
             // echo $sql;
              $result = mysqli_query($con, $sql);
              $empname="";
              $status=false;
              if (mysqli_num_rows($result) > 0) 
              {
                 $status=true;
                // output data of each row
               
      return $status;
          }

}


  function getempperday($con,$id)
          {
              $sql = "SELECT `fld_per_day` FROM tbl_employee WHERE fld_employee_id='$id'";
           //   echo $sql;
              $result = mysqli_query($con, $sql);
              $perday="";
              if (mysqli_num_rows($result) > 0) 
              {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) 
                {
                  $perday=$row['fld_per_day'];
                }
      return $perday;
          }

}

  function getabsent($con,$id,$fdate,$todate)
          {
              $sql = "SELECT * FROM tbl_attendance WHERE empID='$id'  and att_status='absent' and `attdate` between '$fdate' and '$todate'";
           //   echo $sql;
              $result = mysqli_query($con, $sql);
              $total="";
              $total= mysqli_num_rows($result);
             
      return $total;
          }



  function getpresent($con,$id,$fdate,$todate)
          {
              $sql = "SELECT * FROM tbl_attendance WHERE empID='$id' and att_status='present' and `attdate` between '$fdate' and '$todate'";
            // echo $sql;
            
               $result1 = mysqli_query($con, $sql);
              $total1="";
              $total1= mysqli_num_rows($result1);
             
      return $total1;
          }


 ?>