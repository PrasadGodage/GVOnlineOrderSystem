<?php



session_start();







// error_reporting(0);

include('./Admin/config.php');





$username = $_SESSION['username'];

$landmark = $_SESSION['landmark'];

$userid = $_SESSION['userid'];

$address = $_SESSION['address'];

$pincode = $_SESSION['pincode'];

$name = $_SESSION['name'];
$email = $_SESSION['email'];














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

	<title>Add to Cart</title>

</head>





<body>



	<?php include('./nav1.php'); ?>






	<div class="container mb-4">

		<h1 class=" my-4 text-center text-warning">Orders</h1>

		<div class="row">



			<?php

			include('./Admin/config.php');



			$sql = "SELECT * , `orderid` FROM `ordermaster` WHERE `userid` = '$userid' ORDER BY `orderid` DESC";

			$result = mysqli_query($con, $sql);





			if (mysqli_num_rows($result) > 0) {

				while ($row = mysqli_fetch_assoc($result)) { ?>



					<div class="col-md-8" style="margin-bottom:40px;">



						<div class="card">





							<div>

								<div class=" card-body">

									<div class="d-flex justify-content-between align-items-center">



										<h6>Order id: <?php echo $row['orderid']; ?></h6>

										<h6>Status:

											<?php

											if ($row['orderstatus'] == 'Open') {

												echo '<span class="text-danger">OPEN</span>';
											}

											if ($row['orderstatus'] == 'Accept') {

												echo '<span class="text-warning">Accepted</span>';
											}

											if ($row['orderstatus'] == 'Assign') {

												echo '<span class="text-success">Dispatch</span>';
											}

											if ($row['orderstatus'] == 'Cancel') {

												echo '<span class="text-warning">Cancel</span>';
											}
											if ($row['orderstatus'] == 'Delivered') {

												echo '<span class="text-warning">Cancel</span>';
											}

											?>

										</h6>

									</div>

								</div>

								<div class="card-body">





									<p class="card-text">Landmark: <strong><?php echo $row['landmark']; ?></strong></p>

									<p class="card-text">Pincode: <strong><?php echo $row['pincode']; ?></strong></p>

								</div>

								<div class="card-body">

									<div class="d-flex justify-content-between align-items-center">



										<p class="card-text">Bill Amount - Rs. <strong class="text-success"><?php echo $row['orderbillamount']; ?></strong></p>
										<div>



											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="getorderitems(<?php echo $row['orderid'] ?>)">
												Details
											</button>





										</div>

									</div>

								</div>

								<div class="card-body">

									<?php

									$orderid =  $row['orderid'];
									$sta = "Cancel";

									if ($row['orderstatus'] == 'Open') { ?>
										<a class="btn btn-danger form-control" name="cancelorder" href="backend_file.php?status=<?php echo $sta; ?>&orderid=<?php echo $orderid; ?>">Cancel Order</a>
									<?php } else {  ?>
										<!-- <button class="btn btn-danger form-control" disabled>Cancel Order</button> -->
									<?php }  ?>
								</div>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>


	</div>


</body>



</html>

<!-- -----------------------------------------------------------------------------------------------------df -->

<div class="modal fade" id="vieworderitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">View Order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container" id="vieworderitemcontainer">

				</div>

			</div>
			<div class="modal-footer bg-whitesmoke br">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- -----------------------------------------------------------------------------------------------------df -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script> -->


<script>
	$(document).ready(function() {
		//alert('hii');
	});


	function getorderitems(orderid) {
		//alert(orderid);
		//$('#vieworderitem').modal('show');

		var orderidjs = orderid;

		$.ajax({
			url: "OrderBackend.php",
			type: "POST",
			data: {
				orderidjs: orderidjs,
			},
			success: function(data) {
				console.log(data);
				$('#vieworderitemcontainer').html(data);
				$('#vieworderitem').modal('show');

			},
		});

	}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>