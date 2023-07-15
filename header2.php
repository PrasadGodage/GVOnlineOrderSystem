<?php
session_start();

include('./Admin/config.php');


$username = $_SESSION['username'];
$landmark = $_SESSION['landmark'];
$userid = $_SESSION['userid'];
$address = $_SESSION['address'];
$pincode = $_SESSION['pincode'];
$name = $_SESSION['name'];



if (!isset($_SESSION['username'])) {

	header("location:./loginForm.php");
}

if (isset($_POST['add'])) {
  $itemname = $_POST['itemname'];
  $itemimage = $_POST['itemimage'];
  $rate = $_POST['rate'];
  $itemid = $_POST['itemid'];
  $quantity = $_POST['quantity'];
  $currentDate = date('Y-m-d');
  $current_time = date("H:i:s");


  $checksql = "SELECT * FROM `cart` WHERE `userid` = '$userid' AND `itemid` = '$itemid'";

  $checkres = mysqli_query($con, $checksql);

  if (mysqli_num_rows($checkres) > 0) {
    // echo "already Exists";
    $updateqtyincartquery = "UPDATE `cart` SET `qun`=`qun`+$quantity WHERE `userid`='$userid' AND `itemid`='$itemid'";
    mysqli_query($con, $updateqtyincartquery);
  } else {

    $sq = "INSERT INTO `cart` (`orderdate`, `ordertime`, `userid`, `itemid`, `itemname`, `qun`, `rate`, `itemimage`) VALUES ('$currentDate','$current_time','$userid','$itemid','$itemname','$quantity','$rate','$itemimage')";


    $select = mysqli_query($con, $sq);

    if ($select) {

      // echo "Product Added to cart successfully";
    } else {
      echo "Error";
    }
  }
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/bootstrap-icons.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>Food Order System</title>
	<style>
		.food-card {
			margin-bottom: 24px;
		}
	</style>
</head>

<body>



	<?php include('./nav1.php'); ?>


	<!-- <p><span><i class="fa-regular fa-phone"></i></span>-8888888888</p> -->





	<!-- search bar  -->
	<!-- <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="button">
            <i class="material-icons nav__icon">search</i>
          </button>

        </div>
      </div>
    </div>
  </div> -->

	<?php
	$catName = $_GET['catName'];
	// $sql = "SELECT * FROM `itemmaster` WHERE `itemcategoryname` = '$catName'";
	// $result = mysqli_query($con, $sql);
	?>
	<div class="container">

		<div class="row mt-3">
		    <div class="d-flex justify-content-center align-items-center"> 
    <h6 class="mx-4">Category wise filter :</h6>
			<div class="btn-group">
				<button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $catName; ?></button>
				<div class="dropdown-menu">
					<a href="header.php" class="dropdown-item">All Menu</a>
					<?php
					$sqlf = "SELECT * FROM `categorymaster`";
					$resultf = mysqli_query($con, $sqlf);
					if (mysqli_num_rows($resultf) > 0) {
						while ($rowf = mysqli_fetch_array($resultf)) { ?>
							<a class="dropdown-item" href="header2.php?catName=<?php echo $rowf['categoryname']; ?>"><?php echo $rowf['categoryname']; ?></a>
					<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		</div>
	</div>

	<div class="container product-data" style="margin-bottom: 70px;">

		<h4 class="my-4">Foods list 🍴</h4>



		<div class="row">

			<?php
			$catName = $_GET['catName'];
			$sql = "SELECT * FROM `itemmaster` WHERE `itemcategoryname` = '$catName'";
			$result = mysqli_query($con, $sql);


			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) { ?>

					<div class="col-6 col-lg-3 ">
						<form action="" method="POST">
							 <div class="card food-card" height="">

                <input type="hidden" name="itemid" value="<?php echo $row['itemid']; ?>">
                <img src="./Admin/<?php echo $row['itemimage']; ?>" class="card-img-top p-3 rounded-corner" alt="Food 1" width="100px" height="200px">
                <input type="hidden" name="itemimage" value="<?php echo $row['itemimage']; ?>">

                <div class="card-body" style="margin-top: -24px;">
                  <p class="card-title" style="font-size: 12px;"><?php echo $row['itemname']; ?></p>
                  <input type="hidden" name="itemname" value="<?php echo $row['itemname']; ?>">
                  <h6>Rs. <strong> <?php echo $row['rate']; ?>.00</strong></h6>
                  <input type="hidden" name="rate" value="<?php echo $row['rate']; ?>">
                </div>


                <div class="d-flex align-items-center justify-content-between card-body" style="margin-top: -24px;">
                  <input type="number" class="form-control bg-white text-center input-qty" value="1" name="quantity" style="width: 100px;">
                  <input type="submit" value="Add" class="btn btn-warning btn-sm" name="add" />
                </div>


              </div>
						</form>
					</div>
			<?php

				}
			}
			?>


		</div>











	</div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>