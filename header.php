<?php include('./Admin/config.php');

if (isset($_POST['add'])) {
  $itemname = $_POST['itemname'];
  $itemimage = $_POST['itemimage'];
  $rate = $_POST['rate'];
  $quantity = $_POST['quantity'];


  $select = mysqli_query($con, "INSERT INTO `cart`( `name`, `qun`, `price`, `img`) VALUES ('$itemname','$quantity','$rate','$itemimage')");

  if ($select == true) {

    $message[] = "Product Added to cart successfully";
  } else {
    $message[] = "Error";
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
        </div>
      </div>
    </div>
  </div>

  <!-- card section  -->
  <div class="container">

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
                <img src="./Admin/<?php echo $row['itemimage']; ?>" class="card-img-top" alt="Food 1" width="100px" height="200px">
                <input type="hidden" name="itemimage" value="<?php echo $row['itemimage']; ?>">
                <div class="card-body">

                  <div class="d-flex align-items-center justify-content-between mb-2">

                    <h5 class="card-title" name=><?php echo $row['itemname']; ?></h5>
                    <input type="hidden" name="itemname" value="<?php echo $row['itemname']; ?>">

                    <h6>Rs.<?php echo $row['rate']; ?></h6>
                    <input type="hidden" name="rate" value="<?php echo $row['rate']; ?>">

                  </div>

                  <p class="text-justify" style="text-align: justify;"><?php echo $row['itemdisc']; ?></p>
                  <input type="hidden" name="itemdisc" value="<?php echo $row['itemdisc']; ?>">

                  <div class="d-flex align-items-center justify-content-between card-body">
                    <input type="text" class="product-quantity" name="quantity" value="1" size="2" required/>
                    <input type="submit" value="Add" class="btn btn-warning btn-sm" name="add" />

                  </div>

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
</body>

</html>