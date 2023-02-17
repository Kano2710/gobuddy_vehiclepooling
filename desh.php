<?php

require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {
	?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title> Deshboard </title>


		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<style>
		body {
			background-image: url("image/mef.jpg");
			background-repeat: no-repeat;
			background-position: top right;
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-light navbar-inverse">
			<a class="navbar-brand" href="desh.php">Go Buddy</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="desh.php">Add Ride <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="showride.php">Show Ride </a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="history.php">History </a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="ride_req.php">Ride Request </a>
					</li>
				</ul>

				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="profile.php">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php">Log Out</a>
					</li>
				</ul>
			</div>
		</nav>



		<div>
			<form method="POST" action="insert_desh.php">

				<div class="container">


					<hr>


					<div>

						<label>
							<h4>Date</h4>
						</label>

						<input type="date" placeholder="Enter Date" name="date" required>
						<br />
						<label for="time">
							<h4>Time</h4>
						</label>

						<input type="time" placeholder="Enter Time" name="time" required></br>

					</div>
					<div>
						<label for="from"><b>
								<h4>From</h4>
							</b></label>

						<input type="text" placeholder="Enter Source" name="source" required>
						</br>
						<label><b>
								<h4>To</h4>
							</b></label>

						<input type="text" placeholder="Enter Destination" name="destination" required>
					</div>
					<div>
						<label><b>
								<h4>Vacancy</h4>
							</b></label>

						<input type="number" placeholder="vacancy" name="vacancy" required>
						</br>
						<label><b>
								<h4>Vehicle Details :</h4>
							</b></label></br>
						<label><b>
								<h4>Vehicle Name</h4>
							</b></label>

						<input type="text" placeholder="Enter Vehicle Name" name="vehiclename" required>
						</br>
						<label><b>
								<h4>Vehicle Number</h4>
							</b></label>
						<input type="text" placeholder="Enter Vehicle Number"
							pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}" title="Please, enter valid registration number"
							name="vehiclenumber" maxlength="10" required>
						</br>
						<label><b>
								<h4>Vehicle Colour</h4>
							</b></label>
						<input type="text" placeholder="Enter Vehicle Colour" name="vehiclecolour" required>
					</div>



					<hr>


					<input type="submit" name="Register" id="insert" value="Add Ride" class="btn btn-info" />
				</div>

		</div>
		</form>
		</div>

	</body>

	</html>

	<?php

} else
	header("location: index.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
session_destroy();
?>