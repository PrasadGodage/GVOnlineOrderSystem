<?php
session_start();

include('./Admin/config.php');

// $resClose = "SELECT * FROM `firmmaster` WHERE `restaurantstatus` = 0";
// $result1 = mysqli_query($con,$resClose);
// if ($result1) {
//   header("location:closehotel.php");
// } 




$username = $_SESSION['username'];
$email = $_SESSION['email'];
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

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css" integrity="sha512-SgaqKKxJDQ/tAUAAXzvxZz33rmn7leYDYfBP+YoMRSENhf3zJyx3SBASt/OfeQwBHA1nxMis7mM3EV/oYT6Fdw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="input-group">
          <input type="text" class="form-control" onkeyup="searchitem()" id="txtsearchbar" placeholder="Search" aria-label="Search">
          <button class="btn btn-warning" type="button">
            <i class="material-icons nav__icon">search</i>
          </button>

        </div>
      </div>
    </div>
  </div>

  <div class="container product-data" style="margin-bottom: 70px;">

    <h4 class="my-4">Foods list 🍴</h4>



    <div class="row" id="listofmenus">


    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        getmenulist();
      });


      function searchitem() {
        var search = $('#txtsearchbar').val();
        if (search.length > 3) {
          // alert(search);

          $.ajax({
            url: "menus_backend.php",
            type: "POST",
            data: {
              search: search,
            },
            success: function(data) {
              console.log(data);
              $('#listofmenus').html(data);
              // $('#vieworderitem').modal('show');

            },
          });
        } else {
          getmenulist()
        }


      }

      function getmenulist() {
        var getallmenu = "getallmenu";
        $.ajax({
          url: "menus_backend.php",
          type: "POST",
          data: {
            getallmenu: getallmenu,
          },
          success: function(data) {
            console.log(data);
            $('#listofmenus').html(data);
            // $('#vieworderitem').modal('show');

          },
        });
      }
    </script>











  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script>
    function clickCart() {
      

        alertify.set('notifier', 'position', 'top-center');
        alertify.success('Product added to cart successfully');
      }

    
  </script> -->

</body>

</html>