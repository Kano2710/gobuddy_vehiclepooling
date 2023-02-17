<?php

require 'connectDB.php';
session_start();
if (isset($_SESSION["id"])) {


	$sql = "SELECT * FROM addride WHERE id ={$_POST['id']}";
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_assoc($result);


	//$sql1 = "SELECT * FROM addride WHERE id ={$_POST['id']}";
	//$result1=mysqli_query($conn,$sql1);


	?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title> Deshboard </title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
				Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript">
					addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
				</script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="main.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link href="css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
		<link rel="stylesheet" type="text/css" media="screen and (max-width: 360px)" href="portrait.css">
		<link rel="stylesheet" type="text/css" media="screen and (min-width: 361px) and (max-width: 480px)"
			href="landscape.css">
		<link rel="stylesheet" type="text/css" media="screen and (min-width: 481px)" href="desktop.css">
		<script src="js/Chart.js"></script>
		<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
		<script src="js/wow.min.js"></script>
		<script>
			new WOW().init();
		</script>
		<script src="js/jquery-1.10.2.min.js"></script>
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
					<li class="nav-item">
						<a class="nav-link" href="desh.php">Add Ride </a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="showride.php">Show Ride </a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="history.php">History <span class="sr-only">(current)</span></a>
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
			<form method="POST" action="update1.php">

				<div class="container">


					<hr>
					<!--<label><b><h4>User ID</h4></b></label>
							&nbsp;
							<input type="number"  placeholder="User ID" name="uid" required>
							</br>-->

					<label>
						<h4>Ride ID</h4>
					</label>
					<input type="number" placeholder="Enter Date" name="idd" value="<?php echo $row['id']; ?>">
					</br>
					<div>
						<label>
							<h4>Date</h4>
						</label>
						<input type="date" placeholder="Enter Date" name="date" value="<?php echo $row['date']; ?>"
							required>
						<br />

						<label for="time">
							<h4>Time</h4>
						</label>
						<input type="time" placeholder="Enter Time" name="time" value="<?php echo $row['time']; ?>"
							required></br>
					</div>
					<div>
						<label for="from"><b>
								<h4>From</h4>
							</b></label>
						<input type="text" placeholder="Enter Source" name="source" value="<?php echo $row['source']; ?>"
							required>
						</br>
						<label><b>
								<h4>To</h4>
							</b></label>
						<input type="text" placeholder="Enter Destination" name="destination"
							value="<?php echo $row['destination']; ?>" required>
					</div>
					<div>
						<label><b>
								<h4>Vacancy</h4>
							</b></label>

						<input type="number" placeholder="vacancy" name="vacancy" value="<?php echo $row['vacancy']; ?>"
							required>
						</br>
						<label><b>
								<h4>Vehicle Details :</h4>
							</b></label></br>
						<label><b>
								<h4>Vehicle Name</h4>
							</b></label>

						<input type="text" placeholder="Enter Vehicle Name" name="vehiclename"
							value="<?php echo $row['vehiclename']; ?>" required>
						</br>
						<label><b>
								<h4>Vehicle Number</h4>
							</b></label>

						<input type="text" placeholder="Enter Vehicle Number"
							pattern="[A-Za-z]{2}[0-9]{2}[A-Za-z]{2}[0-9]{4}" title="Please, enter valid registration number"
							name="vehiclenumber" maxlength="10" value="<?php echo $row['vehiclenumber']; ?>" required>
						</br>
						<label><b>
								<h4>Vehicle Colour</h4>
							</b></label>

						<input type="text" placeholder="Enter Vehicle Colour" name="vehiclecolour"
							value="<?php echo $row['vehiclecolour']; ?>" required>
					</div>



					<hr>


					<input type="submit" name="Register" id="insert" value="Update" onclick="myFunction()"
						class="btn btn-info" />
				</div>

		</div>
		</form>
		</div>



	</body>

	</html>
	<script>
		function myFunction() {
			alert("Updated!!");
		}
	</script>

	<?php

	//$id = $_SESSION["id"];
//$sql = "INSERT INTO addride (username,mobile) SELECT username,mobile FROM users WHERE username='$id'";
//$result= mysqli_query($conn,$sql) or die("error   ".$conn->error);
} else
	header("location: index.php");
exit;
?>

<?php
mysqli_close($conn); // Closing Connection with Server
session_destroy();
?>