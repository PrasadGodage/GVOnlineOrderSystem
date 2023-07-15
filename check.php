<!-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<button onclick="getLocation()">Get Location</button>

	<input type="text" id="latitude" placeholder="Latitude" readonly>
	<input type="text" id="longitude" placeholder="Longitude" readonly>
	<input type="text" id="accuracy" placeholder="Accuracy" readonly>

	<script>
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(showPosition, showError);
			} else {
				alert("Geolocation is not supported by this browser.");
			}
		}

		function showPosition(position) {
			var latitude = position.coords.latitude;
			var longitude = position.coords.longitude;
			var accuracy = position.coords.accuracy;

			document.getElementById("latitude").value = latitude;
			document.getElementById("longitude").value = longitude;
			document.getElementById("accuracy").value = accuracy;
		}

		function showError(error) {
			switch (error.code) {
				case error.PERMISSION_DENIED:
					alert("User denied the request for Geolocation.");
					break;
				case error.POSITION_UNAVAILABLE:
					alert("Location information is unavailable.");
					break;
				case error.TIMEOUT:
					alert("The request to get user location timed out.");
					break;
				case error.UNKNOWN_ERROR:
					alert("An unknown error occurred.");
					break;
			}
		}
	</script>
</body>

</html> -->


<!-- <!DOCTYPE html>
<html>

<head>
	<title>Location Picker Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
</head>

<body>
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#locationModal">
		Pick Location
	</button>

	<!-- Location Modal -->
<!-- <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="locationModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="locationModalLabel">Pick Location</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div id="map" style="height: 400px;"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-primary" onclick="saveLocation()">Save</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
	<script>
		var map;
		var marker;

		function initMap() {
			var defaultLocation = {
				lat: 0,
				lng: 0
			}; // Set your default location coordinates

			map = new google.maps.Map(document.getElementById("map"), {
				center: defaultLocation,
				zoom: 13
			});

			marker = new google.maps.Marker({
				position: defaultLocation,
				map: map,
				draggable: true
			});
		}

		function saveLocation() {
			var location = marker.getPosition();
			var latitude = location.lat();
			var longitude = location.lng();

			// Perform any additional actions with the latitude and longitude values
			console.log("Latitude: " + latitude);
			console.log("Longitude: " + longitude);

			// Update the input fields or perform any other required tasks
			document.getElementById("latitude").value = latitude;
			document.getElementById("longitude").value = longitude;

			// Close the modal
			$('#locationModal').modal('hide');
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=Google API key&callback=initMap" async defer></script>
</body>

</html> -->

<!DOCTYPE html>
<html>

<head>
	<title>Sliding Food Row</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		.food-item {
			text-align: center;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row" id="food-row">
			<?php
			// Fetch food items from a database or an array
			$foodItems = array(
				array(
					'name' => 'Pizza',
					'image' => 'pizza.jpg',
					'description' => 'Delicious pizza with various toppings'
				),
				array(
					'name' => 'Burger',
					'image' => 'burger.jpg',
					'description' => 'Juicy burger with cheese and vegetables'
				),
				// Add more food items here
			);

			foreach ($foodItems as $foodItem) {
				$name = $foodItem['name'];
				$image = $foodItem['image'];
				$description = $foodItem['description'];

				echo '<div class="col-md-3 food-item">';
				echo '<img src="images/' . $image . '" alt="' . $name . '" class="img-fluid">';
				echo '<h4>' . $name . '</h4>';
				echo '<p>' . $description . '</p>';
				echo '</div>';
			}
			?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>