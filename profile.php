<?php

session_start();




include('./Admin/config.php');


$username = $_SESSION['username'];
$landmark = $_SESSION['landmark'];
$userid = $_SESSION['userid'];
$address = $_SESSION['address'];
$pincode = $_SESSION['pincode'];
$name = $_SESSION['name'];



echo $userid;





if (!isset($_SESSION['username'])) {

	header("location:./loginForm.php");
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

	<title>Profile</title>

</head>


<body>


	<?php include('./nav1.php'); ?>





	<div class="container mt-4">
		<?php

		$query = "SELECT * FROM `usermaster` WHERE `userid` = '$userid'";
		$res = mysqli_query($con, $query);
		if ($res) {
			$fetchq = mysqli_fetch_assoc($res);
		}

		?>
		<div class="card p-4">


			<div class="card-body d-flex flex-column align-items-center ">

				<img src="<?php echo $fetchq['userImage']; ?>" alt="" style="height: 80px; width:80px;" class="rounded-circle mb-2">
				<h4><?php echo $fetchq['name']; ?></h4>
			</div>



			<div class="card-body input-group mb-3">

				<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone" style="color:#FFC107;"></i></span>
				<input type="text" class="form-control bg-warning-subtle" value="<?php echo $fetchq['contact']; ?>" disabled>
			</div>
			<div class="card-body input-group mb-3">

				<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-landmark" style="color:#FFC107;"></i></span>
				<input type="text" class="form-control bg-warning-subtle" value="<?php echo $fetchq['address']; ?>" disabled>
			</div>
			<div class="card-body input-group mb-3">

				<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot" style="color:#FFC107;"></i></span>
				<input type="text" class="form-control bg-warning-subtle" value="<?php echo $fetchq['landmark']; ?>" disabled>
			</div>
			<div class="card-body input-group mb-3">

				<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-box" style="color:#FFC107;"></i></span>
				<input type="disabled" class="form-control bg-warning-subtle" value="<?php echo $fetchq['pincode']; ?>" disabled>
			</div>


		</div>

		<div class="row" style="display:flex; align-items:center; justify-content:center;">

			<button type="button" class="btn btn-primary mt-3 col-4 mx-2" data-bs-toggle="modal" data-bs-target="#editModal">
				Edit Profile
			</button>
			<button type="button" class="btn btn-primary mt-3 col-4" data-bs-toggle="modal" data-bs-target="#changePass">
				Change Pass
			</button>
		</div>

		<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<!-- Add your profile edit form here -->


						<form action="back2.php" method="POST" enctype="multipart/form-data">
							<div class="form-group d-flex align-items-center justify-content-between">
								<img src="<?php echo $fetchq['userImage']; ?>" alt="" style="height: 80px; width:80px;" class="rounded-circle mb-2 mx-3">
								<input type="file" name="upImage" value="<?php echo $fetchq['userImage']; ?>">
							</div>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="upName" value="<?php echo $fetchq['name']; ?>">
							</div>
							<div class="form-group">
								<label for="name">Address</label>
								<input type="text" class="form-control" name="upAddress" value="<?php echo $fetchq['address']; ?>">
							</div>
							<div class="form-group">
								<label for="name">Landmark</label>
								<input type="text" class="form-control" name="upLandmark" value="<?php echo $fetchq['landmark']; ?>">
							</div>
							<div class="form-group">
								<label for="name">Pincode</label>
								<input type="text" class="form-control" name="upPincode" value="<?php echo $fetchq['pincode']; ?>">
								<input type="hidden" class="form-control" name="userid" value="<?php echo $userid; ?>">
							</div>
							<button type="submit" class="btn btn-primary mt-3" name="update">Update</button>

						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="changePass" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<!-- Add your profile edit form here -->
						<form action="back2.php" method="POST">
							<div class="form-group">
								<label for="name">Old Password</label>
								<input type="text" class="form-control" id="name" placeholder="Enter old password" name="oldPass">
							</div>
							<div class="form-group">
								<label for="name">Change Password</label>
								<input type="text" class="form-control" id="name" placeholder="Enter new password" name="newPass">
								<input type="hidden" class="form-control" name="userid" value="<?php echo $userid; ?>">

							</div>
							<div class="form-group">
								<label for="name">Confirm Password</label>
								<input type="text" class="form-control" id="name" placeholder="Confirm your">
							</div>
							<button class="btn btn-primary mt-3" name="change">Change Password</button>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>



		<div class="container my-5">
			<?php
			$s = "SELECT `itemid` FROM orderdetails WHERE `userid` = '$userid' GROUP BY `itemid` ORDER BY COUNT(`qty`) DESC LIMIT 11";




			$r = mysqli_query($con, $s);

			if ($r) {
				$f = mysqli_fetch_assoc($r);

				$rr = mysqli_num_rows($r);

				$it = $f['itemid'];



				$s1 = "SELECT * FROM `itemmaster` WHERE `itemid` = '$it'";



				$r1 = mysqli_query($con, $s1);

				if ($r1) {
					$f1 = mysqli_fetch_assoc($r1);
				}
			}


			?>


			<h4 class="text-center">Your Favourite Dish 😋</h4>
			<div class="card mt-4">
				<div style="display: flex; align-items:center; justify-content:end">
					<div class="card-body">


						<img src="./Admin/<?php echo $f1['itemimage']; ?>" height="80px" width="80px">
					</div>
					<div class="card-body">
						<h5 class="card-title"><?php echo $f1['itemname']; ?></h5>
					</div>
					<div class="card-body">
						<h5 class="card-title">Repeat time :
							<br>
							<?php echo $rr; ?>
						</h5>
					</div>

				</div>
			</div>



			<div class="card mt-5">
				<div class="p-2">

					<h5>Paytm Privacy Policy - <a href="https://order.rajeshahihotel.com/paytmprivacy.php">Click here</a></h5>
					<h5>Paytm Terms and Condition - <a href="https://order.rajeshahihotel.com/paytmterms.php">Click here</a></h5>
				</div>
			</div>

		</div>
		<div class="container">

			<a href="./logout.php" class="btn btn-danger form-control" style="margin-bottom:75px;">Logout</a>
		</div>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>





</body>

</html>