<?php
include('header/header.php');
//getting list of party

//get the challan Number 
$query = "SELECT MAX(id) FROM expencemaster";
$result = mysqli_query($con,  $query);
$row = mysqli_fetch_row($result);
// echo
$highestValue =  "EXP00".$row[0]+1;
//------------ENDS--------------


if(isset($_POST['submitexpence']))
{
    $expno=$_POST['expno'];
    $expdate=$_POST['expdate'];
    $expname=$_POST['expname'];
    $expamt=$_POST['expamt'];
    $billtype=$_POST['billtype'];
    $expdisc=$_POST['expdisc'];

    $insertexpence = "INSERT INTO `expencemaster`(`expno`,`expname`, `date`, `disc`, `amount`, `paymenttype`)
     VALUES ('$expno','$expname','$expdate','$expdisc','$expamt','$billtype')";

    mysqli_query($con, $insertexpence);
}

?>


      <!-- Main Content -->
      <div class="main-content ">
        <section class="section justify-content-center">
          <div class="section-body">
            <!-- add content here -->

            <div class="card">
        <div class="card-header">
          <h4>New Expence Entry</h4>
          <!-- <a class="text-right">View all</a> -->
         
        </div>
        <div class="card-body">
        <div class="row justify-content-end">
                  <a href="viewallexpences.php"><button class="btn btn-primary justify-content-end">View All Expence Record</button></a>
            </div>
          <form action="" method="post" enctype="multipart/form-data" class="col-12">
            <div class="row ">
              <div class="form-group col-2">
                <label>Expence No</label>
                <input type="text" name="expno" class="form-control" value="<?php echo $highestValue?>" readonly>
              </div>

              <div class="form-group col-7">
                <label>Expence Name</label>
                <input type="text" name="expname"  class="form-control" id="">
              </div>
              <div class="form-group col-3">
                <label>Date</label>
                <input type="date" name="expdate"  class="form-control" id="">
              </div>
             

              <div class="form-group col-6">
                <label>Amount</label>
                <input type="number" name="expamt"  class="form-control" id="fdate">
              </div>


              <div class="form-group col-6">
                <label>Transaction Type</label>
                <select class="form-control" id="billtype" name="billtype" >
                          <option value="">Select Payment Type</option>
                          <option value="cash">Cash</option>
                          <option value="Online">Online</option>
                          <option value="credit">Credit</option>
                          <option value="chequee">chequee</option>
                        </select>
              </div>
              <div class="form-group col-12">
                <label>Expence Discription</label>
                <Textarea class="form-control" name="expdisc"></Textarea>
              </div>
                   
                    
             

            </div>

            <div class="card-footer text-right">
             
             <button class="btn btn-primary mr-1" name="submitexpence" type="submit">Submit</button>
             
              <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
        </div>
      </div>
</form>


          </div>
        </section>
     

 <?php
 include('footers/footer.php');
?>