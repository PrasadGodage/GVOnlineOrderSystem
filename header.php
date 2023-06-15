<?php
session_start();
error_reporting(0);
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
  $currentTime = time();


  $select = mysqli_query($con, "INSERT INTO `cart`(`orderdate`, `userid`, `itemid`, `itemname`, `qun`, `rate`, `itemimage`) VALUES ('$currentDate','$userid','$itemid','$itemname','$quantity','$rate','$itemimage')");

  if ($select) {

    echo "Product Added to cart successfully";
  } else {
    echo "Error";
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
  <title>Food Order System</title>
  <style>
    .food-card {
      margin-bottom: 24px;
    }
  </style>
</head>

<body>


  <?php include('./navabar.php'); ?>

  <!-- search bar  -->
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="button">
            <i class="material-icons nav__icon">search</i>
          </button>
          <a href="logout.php">logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- card section  -->
  <div class="container product-data" style="margin-bottom: 70px;">

    <h4 class="my-4">Change Heading</h4>



    <div class="row">

      <?php

      $sql = "SELECT * FROM `itemmaster`";
      $result = mysqli_query($con, $sql);


      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>

          <div class="col-6">
            <form action="" method="POST">
              <div class="card food-card">
                <input type="hidden" name="itemid" value="<?php echo $row['itemid']; ?>">
                <img src="./Admin/<?php echo $row['itemimage']; ?>" class="card-img-top" alt="Food 1" width="100px" height="200px">
                <input type="hidden" name="itemimage" value="<?php echo $row['itemimage']; ?>">
                <div class="card-body">
                  <h6 class="card-title" name=><?php echo $row['itemname']; ?></h6>
                  <input type="hidden" name="itemname" value="<?php echo $row['itemname']; ?>">
                  <h6>Rs. <strong> <?php echo $row['rate']; ?>.00</strong></h6>
                  <input type="hidden" name="rate" value="<?php echo $row['rate']; ?>">
                </div>


                <div class="d-flex align-items-center justify-content-between card-body">
                  <div class="input-group input-group-sm" style="width: 80px;">
                    <button class="input-group-text decrement" id="decrement">-</button>
                    <input type="text" class="form-control bg-white text-center input-qty" id="" value="1" disabled>
                    <button class="input-group-text increment" id="increment">+</button>
                  </div>
                  <!-- <input type="text" class="product-quantity" name="quantity" value="1" size="2" required /> -->
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




  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    // $(document).ready(function() {
    //   $('.increment').click(function(e) {
    //     e.preventDefault();

    //     var qty = $(this).closet('.product-data').find('.input-qty').val();
    //     var value = parseInt(qty, 10);

    //     value = isNaN(value) ? 0 : value;
    //     if (value < 10) {
    //       value++;
    //       $(this).closet('.product-data').find('.input-qty').val(value);
    //     }


    //   });
    // });


    $(function() {
      $('.increment').click(function() {
        alert("Plus")
      })
    })
  </script>
</body>

</html>