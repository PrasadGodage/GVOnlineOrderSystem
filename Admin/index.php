<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Restorent Booking</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section" style="margin-top:100px">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">

              <div class="card-header">
                <center>
                  <h2 class="text-cenetr">Restorent Booking</h2>
                </center>
                <!-- <br>
              <h4 class="text-center">Login</h4> -->
              </div>
              <div class="card-body">

                <?php

                if (isset($_POST['login'])) {
                  extract($_POST);

                  $username = mysqli_real_escape_string($con, $_POST['txtusername']);
                  $Password = mysqli_real_escape_string($con, $_POST['password']);
                  //   echo $mobile_number;
                  $log = mysqli_query($con, "select * from usermaster where username='$username' and password='$Password'") or die(mysqli_error($connect));
                  // echo $log;
                  if (mysqli_num_rows($log) > 0) {
                    $fetch = mysqli_fetch_array($log);

                    $_SESSION['id'] = $fetch['userid'];
                    $_SESSION['mobile_number'] = $fetch['contact'];
                    $_SESSION['name'] = $fetch['name'];
                    $_SESSION['usertype'] = $fetch['usertype'];

                    echo $_SESSION['usertype'];

                    echo "<script>";
                    echo "alert('Login Successfull');";
                    echo 'window.location.href="dashboard.php";';
                    echo "</script>";
                  } else {
                    echo "<script>";
                    echo "alert('Please Enter Correct Username Or Password ');";
                    echo "</script>";
                  }
                }

                ?>
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="text" type="text" class="form-control" value="" name="txtusername" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill your username
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label" value="1234">Password</label>
                      <div class="float-right">
                        <!-- <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a> -->
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->

</html>