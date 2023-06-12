<?php
include('header/header.php');
include('config.php');
$rcname="";


// if(!isset($_GET['menuid']))
// {
//     echo $_GET['menuid'];
// }

$menuid=$_GET['menuid'];


$selectchllanquery = "SELECT * FROM `itemmaster` where `itemid`='$menuid'";
// echo $selectchllanquery;
$result = mysqli_query($con, $selectchllanquery);
$row = mysqli_fetch_assoc($result);
$rcname="";

if(mysqli_num_rows($result)>0)
{
  $rcname="1";

$rfirmlogo = $row['itemimage'];


}

if (isset($_POST['submitnewlogo'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["uplogo"]["name"]);
  $tempfile = $_FILES["uplogo"]["tmp_name"];

  if (move_uploaded_file($tempfile, $target_file)) {

    $query = "UPDATE `itemmaster` SET `itemimage`='$target_file' WHERE `itemid`='$menuid'";

    mysqli_query($con, $query);
    echo '<script>
           window.location = "managemenu.php"
      </script>';
  }


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

    


    <?php
    if($rcname==1)
    {?>
  <div class="card">
        <div class="card-header">
          <h4>Menu thumbnail</h4>
        </div>
        <div class="card-body">
        <div class="row">
          <div class="col text-center">
          <img src="<?php echo $rfirmlogo; ?>" height="200px" width="200px" alt=""><br>
          <button class="btn btn-primary" onclick="viewform()">Change Thumbnail</button>
          </div>
          <div class="col">
            <hr>
              <form action="" method="POST" enctype="multipart/form-data" class="col-12 col-lg-6 mt-3" id="frm-upload-logo" style="display:none;">
                <label for="">Choose New Thumbnail for menu</label>
                  <input type="file" name="uplogo" class="form-control" id="">
                  <button type="submit" name="submitnewlogo" class="btn btn-primary form-control mt-2">Upload Thumbnail</button>
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

