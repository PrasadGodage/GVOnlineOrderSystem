<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>



	<?php
	session_start();
	include('./Admin/config.php');
	include('./Admin/functions.php');
	extract($_POST);
	// $loginuserid=$_SESSION['id'];
	//fetching New Orders
	if (isset($_POST['getallmenu'])) {
		$tabledata = "";
		$selectmenulist = "SELECT * FROM `itemmaster`";
		// echo $selectmenulist;
		$res = mysqli_query($con, $selectmenulist);

		if (mysqli_num_rows($res) > 0) {
			$num = 1;
			while ($row = mysqli_fetch_array($res)) {
				$filepath = "./Admin/" . $row['itemimage'];
				$tabledata .= " <div class='col-6 col-lg-3 col-sm-4'>
				<form action='' method='POST'>
				  <div class='card food-card' height='500px'>
					<input type='hidden' name='itemid' value='" . $row['itemid'] . "'>
					<img src='" . $filepath . "' class='card-img-top' alt='Food 1' width='100px' height='200px'>
					<input type='hidden' name='itemimage' value='" . $row['itemimage'] . "'>
					<div class='card-body'>
					  <p style='font-size:10px' class='card-title' name=>" . $row['itemname'] . "</p>
					  <input type='hidden' name='itemname' value='" . $row['itemname'] . "'>
					  <h6>Rs. <strong> " . $row['rate'] . ".00</strong></h6>
					  <input type='hidden' name='rate' value='" . $row['rate'] . "'>
					</div>
	
	
					<div class='d-flex align-items-center justify-content-between card-body'>
					  <div class='input-group input-group-sm' style='width: 100px;'>
	
						<input type='number' class='form-control bg-white text-center input-qty' value='1' name='quantity'>
	
					  </div>
	
					  <input type='submit' value='Add' class='btn btn-warning btn-sm' name='add'/>
	
					</div>
	
	
				  </div>
				</form>
			  </div>";
				$num++;
			}
		} else {
			$tabledata = "";
		}

		echo $tabledata;
	}


	if (isset($_POST['search'])) {
		$tabledata = "";
		$selectmenulist = "SELECT * FROM `itemmaster` where `itemname` LIKE '%$search%'";
		// echo $selectmenulist;
		$res = mysqli_query($con, $selectmenulist);

		if (mysqli_num_rows($res) > 0) {
			$num = 1;
			while ($row = mysqli_fetch_array($res)) {
				$filepath = "./Admin/" . $row['itemimage'];
				$tabledata .= " <div class='col-6 col-lg-3'>
				<form action='' method='POST'>
				  <div class='card food-card' height='500px'>
					<input type='hidden' name='itemid' value='" . $row['itemid'] . "'>
					<img src='" . $filepath . "' class='card-img-top' alt='Food 1' width='100px' height='200px'>
					<input type='hidden' name='itemimage' value='" . $row['itemimage'] . "'>
					<div class='card-body'>
					  <p class='card-title' name=>" . $row['itemname'] . "</p>
					  <input type='hidden' name='itemname' value='" . $row['itemname'] . "'>
					  <h6>Rs. <strong> " . $row['rate'] . ".00</strong></h6>
					  <input type='hidden' name='rate' value='" . $row['rate'] . "'>
					</div>
	
	
					<div class='d-flex align-items-center justify-content-between card-body'>
					  <div class='input-group input-group-sm' style='width: 100px;'>
	
						<input type='number' class='form-control bg-white text-center input-qty' value='1' name='quantity'>
	
					  </div>
	
					  <input type='submit' value='Add' class='btn btn-warning btn-sm' name='add'/>
	
					</div>
	
	
				  </div>
				</form>
			  </div>";
				$num++;
			}
		} else {
			$tabledata = "";
		}

		echo $tabledata;
	}

	?>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>