<?php
include('header/header.php');
include('config.php');
$rcname="";

$selectchllanquery = "SELECT * FROM `firmmaster` where `firmid`='1'";
// echo $selectchllanquery;
$result = mysqli_query($con, $selectchllanquery);
$row = mysqli_fetch_assoc($result);
$rcname="";

if(mysqli_num_rows($result)>0)
{
  $rcname="1";
  $rfirmname = $row['firmname'];
$rfirmdisc = $row['firmdisc'];
$rfirmaddress = $row['firmaddress'];
$rfirmcontact = $row['firmcontact'];
$rparcelcontact = $row['parcelcontact'];
$rfassinumber = $row['fassinumber'];
$rownername = $row['ownername'];
$rlandmark = $row['landmark'];
$rpincode = $row['pincode'];
$rlocation = $row['location'];
$rfirmlogo = $row['firmlogo'];


}

if (isset($_POST['submitnewlogo'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["uplogo"]["name"]);
  $tempfile = $_FILES["uplogo"]["tmp_name"];

  if (move_uploaded_file($tempfile, $target_file)) {

    $query = "UPDATE `firmmaster` SET `firmlogo`='$target_file' WHERE `firmid`='1'";

    mysqli_query($con, $query);
    // echo '<script>window.location.reload() </script>';

  }


}


if (isset($_POST['submitcomapny'])) {
  $firmname = $_POST['txtfirmname'];
  $firmdisc = $_POST['txtfirmdisc'];
  $firmaddress = $_POST['txtfirmaddress'];
  $firmcontact = $_POST['txtfirmcontact'];
  $parcelcontact = $_POST['txtparcelcontact'];
  $fassinumber = $_POST['txtfassinumber'];
  $ownername = $_POST['txtownername'];
  $landmark = $_POST['txtlandmark'];
  $pincode = $_POST['txtpincode'];
  $location = $_POST['txtlocation'];


  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["logo"]["name"]);
  $tempfile = $_FILES["logo"]["tmp_name"];
  // $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (move_uploaded_file($tempfile, $target_file)) {

    $query = "INSERT INTO `firmmaster`(`firmname`, `firmdisc`, `firmaddress`, `firmcontact`, `parcelcontact`, `fassinumber`, `ownername`, `landmark`, `pincode`, `firmlogo`) 
                              VALUES ('$firmname','$firmdisc','$firmaddress','$firmcontact','$parcelcontact','$fassinumber','$ownername','$landmark','$pincode','$target_file')";

    mysqli_query($con, $query);
    // echo '<script>window.location.reload() </script>';

  } else {

    $query = "INSERT INTO `firmmaster`(`firmname`, `firmdisc`, `firmaddress`, `firmcontact`, `parcelcontact`, `fassinumber`, `ownername`, `landmark`, `pincode`) 
                              VALUES ('$firmname','$firmdisc','$firmaddress','$firmcontact','$parcelcontact','$fassinumber','$ownername','$landmark','$pincode')";

      mysqli_query($con, $query);
      // echo '<script> window.location.reload() </script>';

    //echo "Sorry, there was an error uploading your file.";
  }

}


//update restorent code is here
if (isset($_POST['updatecomapny'])) {
  $firmname = $_POST['txtfirmname'];
  $firmdisc = $_POST['txtfirmdisc'];
  $firmaddress = $_POST['txtfirmaddress'];
  $firmcontact = $_POST['txtfirmcontact'];
  $parcelcontact = $_POST['txtparcelcontact'];
  $fassinumber = $_POST['txtfassinumber'];
  $ownername = $_POST['txtownername'];
  $landmark = $_POST['txtlandmark'];
  $pincode = $_POST['txtpincode'];
  $location = $_POST['txtlocation'];


    $query = "UPDATE `firmmaster` SET `firmname`='$firmname',`firmdisc`='$firmdisc',`firmaddress`='$firmaddress',`firmcontact`='$firmcontact',`parcelcontact`='$parcelcontact',`fassinumber`='$fassinumber',`ownername`='$ownername',`landmark`='$landmark',`pincode`='$pincode' WHERE `firmid`='1'";

    mysqli_query($con, $query);




}

?>


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <!-- add content here -->


      <div class="row justify-content-center">
        <h3></h3>

      </div>

      <div class="card">
        <div class="card-header">
          <h4>Restaurant Details</h4>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">

          <div class="row">
            <div class="col-12 col-lg-6">
            <label for="">Restaurant Name</label>
              <input type="text" name="txtfirmname" value="<?php echo $rfirmname ?>" class="form-control" >
            </div>
            <div class="col-12 col-lg-6">
              <label for="">Owner Name </label>
              <input type="text" name="txtownername" value="<?php echo $rownername ?>" class="form-control" >
            </div>
          </div>


          <div class="row mt-2">
            <div class="col-12 col-lg-6">
            <label for="">Parcel Contact</label>
              <input type="text" name="txtparcelcontact" value="<?php echo $rparcelcontact ?>" class="form-control">
            </div>
            <div class="col-12 col-lg-6">
              <label for="">Restaurant Contact</label>
              <input type="text" name="txtfirmcontact" value="<?php echo $rfirmcontact ?>" class="form-control" >
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-12 col-lg-6">
            <label for="">Restaurant Discription</label>
              <textarea name="txtfirmdisc" class="form-control" id="" cols="30" rows="10"><?php echo $rfirmdisc ?></textarea>
            </div>
            <div class="col-12 col-lg-6">
              <label for="">Restaurant Address</label>
              <textarea name="txtfirmaddress" class="form-control"  id="" cols="30" rows="10"><?php echo $rfirmaddress?></textarea>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-12 col-lg-4">
            <label for="">FASSI Number</label>
            <input type="text" name="txtfassinumber" value="<?php echo $rfassinumber ?>" class="form-control" >
            </div>
            <div class="col-12 col-lg-4">
              <label for="">Landmark</label>
              <input type="text" name="txtlandmark" value="<?php echo $rlandmark ?>" class="form-control" >
            </div>
            <div class="col-12 col-lg-4">
              <label for="">Pincode</label>
              <input type="text" name="txtpincode" value="<?php echo $rpincode ?>" class="form-control" >
            </div>
          </div>

        <?php

        if($rcname=="")
        {?>
          <div class="row mt-2">
            <div class="col-12 col-lg-6">
            <label for="">Restaurant Logo</label>
              <input type="file" name="logo" class="form-control" >
            </div>
           
          </div>

        <?php }

        ?>
     



            <div class="card-footer text-right">
              <?php
               if ($rcname == "") {
                echo '<button class="btn btn-primary mr-1" name="submitcomapny" type="submit">Submit</button>';
              } else {
                echo '<button class="btn btn-warning mr-1" name="updatecomapny" type="submit">Update Restorent Details</button>';

              } 
              ?>

              <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
        </div>
      </div>
      </form>


    <?php
    if($rcname==1)
    {?>
  <div class="card">
        <div class="card-header">
          <h4>Restaurant Logo </h4>
        </div>
        <div class="card-body">
        <div class="row">
          <div class="col text-center">
          <img src="<?php echo $rfirmlogo; ?>" height="200px" width="200px" alt=""><br>
          <button class="btn btn-primary" onclick="viewform()">Change Logo</button>
          </div>
          <div class="col">
            <hr>
              <form action="" method="POST" enctype="multipart/form-data" class="col-12 col-lg-6 mt-3" id="frm-upload-logo" style="display:none;">
                <label for="">Choose New Logo</label>
                  <input type="file" name="uplogo" class="form-control" id="">
                  <button type="submit" name="submitnewlogo" class="btn btn-primary form-control mt-2">Upload Logo</button>
              </form>
          </div>
        </div>
            </div>
    <?php }
    ?>

    </div>
  </section>

  <script>
    function viewform()
    {
      document.getElementById('frm-upload-logo').style.display="block";
    }
  </script>

  <?php
  include('footers/footer.php');
  ?>

